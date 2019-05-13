<?php
class DatabaseFunctions{
    public $table;
    
    function __construct($table)
    {
        $this->table = $table;
    }
    
    function save($record,$pk='')
    { 
      try {
        $this->insert($record);
      } catch (Exception $e) {
        $this->edit($record,$pk);    
      }
        
    }
    function insert($record) {
        global $pdo;
        
        $keys = array_keys($record);

        $values = implode(', ', $keys);
        
        $valuesWithColon = implode(', :', $keys);
        
        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';     
      
        $stmt = $pdo->prepare($query);

        $stmt->execute($record);
        
    }

    function insertInLevel($student_id)
    {
        global $pdo;
        $lastLevel = $pdo->prepare("SELECT student_id FROM lvlstudent WHERE student_id = ".$student_id);
        $lastLevel->execute();
        $exits = true;
        if ($lastLevel->rowCount() == 0) {
            $exits = false;
        }
        if (!$exits) {
            $stmt = $pdo->prepare('INSERT INTO lvlstudent(Lv_ID,student_id,level_id) VALUES("",:student_id,:year)');
            $records =['student_id'=> $student_id,'year'=>1];
            $stmt->execute($records);
        }

    }

    function find($field, $value) {
        global $pdo;
        $query = 'SELECT * FROM '.$this->table.' WHERE '. $field .' = :value';
        $stmt = $pdo->prepare($query);
        $criteria = [
                'value' => $value
        ];
        $stmt->execute($criteria);
        return $stmt;
    }
    
    function findSpc($vals, $arch)
    {
        global $pdo;
        $str = implode(', ', $vals);

        $stmt = $pdo->prepare('SELECT '.$str.' FROM ' . $this->table . ' WHERE archive = :arch');
   
        $stmt->execute(['arch' => $arch]);

        return $stmt;
    }

    function findAllSpc($vals)
    {
        global $pdo;
        $str = implode(', ', $vals);

        $stmt = $pdo->prepare('SELECT '.$str.' FROM ' . $this->table );
   
        $stmt->execute();

        return $stmt;
    }

    function findAll() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM ' . $this->table );

        $stmt->execute();

        return $stmt;
    }

    function delete($crit,$id)
    {
        global $pdo;
        $query = "DELETE FROM $this->table WHERE $crit =:id";
        $stmt = $pdo->prepare($query);

        $critero = ['id'=> $id];
        $stmt->execute($critero);
    }
    function edit($records,$pk)
    {
        global $pdo;
        $update ="UPDATE $this->table SET ";
        foreach ($records as $key => $value) {
            $paras[] = $key ." =:".$key;
        }
        $params = implode(',',$paras);
        $update .= $params;
        $update .=" WHERE $pk = :pk";
        $records['pk'] = $records[$pk]; 
        $stmt = $pdo->prepare($update);
        $stmt->execute($records);
    }

    function archive($id, $archive,$pk)
    {
        global $pdo;

        $update ="UPDATE $this->table SET archive = :archive";
        $update .=" WHERE $pk = :id";

        $critero = ['id'=> (int)$id,
                    'archive' => $archive ];

        $stmt = $pdo->prepare($update);
        $stmt->execute($critero);
    }

     function archiveMod($id, $archive,$pk)
    {
        global $pdo;

        $update ="UPDATE $this->table SET archive = :archive";
        $update .=" WHERE $pk = :id";

        $critero = ['id'=> $id,
                    'archive' => $archive ];

        $stmt = $pdo->prepare($update);
        $stmt->execute($critero);
    }

    function findLast($pk)
    {
        global $pdo;
        $query = 'SELECT * FROM '.$this->table.' ORDER BY '.$pk.' DESC';
        $last= $pdo->prepare($query);
        $last->execute();
        return $last;
    }

    function search($criteria,$value,$archive)
    {
        global $pdo;
        $fullname = "CONCAT(CONCAT(first_name , CONCAT(' ', middle_name)), CONCAT(' ', surname))";
        $vals=['student_id',$fullname, 'email' ,'first_name','perm_address','phone_number','record_status'];
        $str = implode(', ', $vals);
        $searchQ = 'SELECT '.$str.' FROM '. $this->table .' WHERE '.$criteria.' LIKE :value"%" AND archive = :archive';
        $data =['value'=>$value,'archive'=>$archive];
        $statement = $pdo->prepare($searchQ);
        $statement->execute($data);
        return $statement;
    }

    function checkPassword($username,$password,$pk)
    {
        global $pdo;
        $user = $this->find($pk,$username);
        $stud = $user->fetch();
        if ($this->table == "admin") {
            if ($user->rowCount() > 0) {
                if (($stud[$pk] == $username) && (password_verify($password, $stud['password'])) ) {
                   return true;
                }else{
                   return false;
                }
           }
        }else if($this->table == "student")
        {
            if ($stud['archive'] == "no" && $stud['record_status'] == "Live") {
                if ($user->rowCount() > 0) {
                    if (($stud[$pk] == $username) && (password_verify($password, $stud['password'])) ) {
                       return true;
                    }else{
                       return false;
                    }
               }
            }else{
                return false;
            }
        }else{
            if ($stud['archive'] == "no") {
                if ($user->rowCount() > 0) {

                    if (($stud[$pk] == $username) && (password_verify($password, $stud['password'])) ) {
                       return true;
                    }else{
                       return false;
                    }
               }
            }else{
                return false;
            }
        }
    }

    }
?>