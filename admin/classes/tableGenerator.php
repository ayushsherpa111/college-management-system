<?php  
class tableGenerator 
{
	private $headings;
	private $rows =[];
	private $fullname;
	private $archive;

	function getFullName($first_name,$middle_name,$lastname)
	{
		$fullname = $first_name . ' '.$middle_name.' '.$lastname;

	}
	public function setHeadings($headings)
	{
		$this->headings = $headings;
	}
	public function setArchive($archive) {
		$this->archive = $archive;
	}
	public function addRow($row)
	{
		unset($row['first_name']);
		unset($row['middle_name']);
		unset($row['surname']);
		$this->rows[]= $row;
	}
	function generateStudents()
	{
		$table='<table class="list-table"><thead><tr>';
		foreach ($this->headings as $row) {
			if($row == "Action")
			{
				$table.='<th colspan="4" style="text-align: center;">'.$row.'</th>';	
			}
			else
			{
				$table.='<th>'.$row.'</th>';
			}
		}
		$table.="</tr>";
		$table.='</thead>';

		$table.='<tbody>';
		foreach ($this->rows as $r) {
			$table.='<tr>';
			foreach ($r as $key => $val) {
				if(!is_numeric($key))
				{
					if($key == "student_id")
					{
						$student_id= $val;
					}

					if ($key == "record_status") {				
						$table.='<td>'.$val.'</td>';

						if ($this->archive == 'yes') {
							$table.='<td><a href=index.php?page=students.php&aid='.$student_id.' title="Archive Student"><i class="fa fa-archive fa-color" aria-hidden="true"></i></a></td>';
						}
						else {								
							$table.='<td><a href=index.php?page=archive.php&aid='.$student_id.' title="Undo Archive"><i class="fa fa-archive fa-color" aria-hidden="true"></i></a></td>';
						}
						$table.='<td><a href=index.php?page=portfolio.php&eid='.$student_id.' title="Edit Student"><i class="fa fa-pencil fa-color" aria-hidden="true"></i></a></td>';
						$table.='<td><a href="index.php?page=students.php&delid='.$student_id.'" title="Delete Student" onclick="return checkDelete()"><i class="fa fa-trash fa-color" aria-hidden="true"></i></a></td>';
						$table.='<td class="aIWidth"><a href="index.php?page=message.php&msgid='.$student_id.'" title="Message Student"><i class="fa fa-comments-o fa-color" aria-hidden="true"></i></a></td>';
					}
					else{
						$table.='<td><a href=index.php?page=portfolio.php&id='. $student_id .'>'.$val.'</a></td>';
					}
				}
			}
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table>';
		return $table;
	}	
}
?>