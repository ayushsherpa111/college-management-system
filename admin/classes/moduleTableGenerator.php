<?php  
class moduleTableGenerator
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
		$type;
		$table='<table class="list-table"><thead><tr>';
		foreach ($this->headings as $row) {
			if($row == "Action")
			{
				$table.='<th colspan="3" style="text-align: center;">'.$row.'</th>';	
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
					if($key == "mod_id")
					{
						$module_ID = $val;
						$type = "module";
					}elseif ($key == "leader_id") {
						$courseId = $val;
						$type = "course";
					}
					if ($type == "module") {
						if ($key == "phone_number") {				
							$table.='<td>'.$val.'</td>';

							if ($this->archive == 'yes') {
								$table.='<td><a href="index.php?page=moduleLeaders.php&aid='.$module_ID.'" title="Archive Staff"><i class="fa fa-archive fa-color" aria-hidden="true"></i></a></td>';
							}
							else {								
								$table.='<td><a href="index.php?page=moduleLeadersArchive.php&aid='.$module_ID.'" title="Undo Archive"><i class="fa fa-archive fa-color" aria-hidden="true"></i></a></td>';
							}
							$table.='<td><a href="index.php?page=portfolio.php&mEid='.$module_ID.'" title="Edit Staff"><i class="fa fa-pencil fa-color" aria-hidden="true"></i></a></td>';
							$table.='<td><a href="index.php?page=moduleLeaders.php&delid='.$module_ID.'" title="Delete Staff" onclick="return checkDelete()"><i class="fa fa-trash fa-color" aria-hidden="true"></i></a></td>';
						}
						else{
							$table.='<td><a href="index.php?page=portfolio.php&mid='. $module_ID .'">'.$val.'</a></td>';
						}
					}else{
						if ($key == "phone_number") {				
							$table.='<td>'.$val.'</td>';
							if ($this->archive == 'yes') {
								$table.='<td><a href="index.php?page=courseLeader.php&aCid='.$courseId.'" title="Archive Staff"><i class="fa fa-archive fa-color" aria-hidden="true"></i></a></td>';
							}
							else {								
								$table.='<td><a href="http://localhost/woodlands_uc1/admin/public_html/index.php?page=courseLeaderArchive.php&aCid='.$courseId.'" title="Undo Archive"><i class="fa fa-archive fa-color" aria-hidden="true"></i></a></td>';
							}
							$table.='<td><a href="index.php?page=portfolio.php&cEid='.$courseId.'" title="Edit Staff"><i class="fa fa-pencil fa-color" aria-hidden="true"></i></a></td>';
							$table.='<td><a href="index.php?page=courseLeader.php&delCid='.$courseId.'" title="Delete Staff" onclick="return checkDelete()"><i class="fa fa-trash fa-color" aria-hidden="true"></i></a></td>';
						}
						else{
							$table.='<td><a href=index.php?page=portfolio.php&cid='. $courseId .'>'.$val.'</a></td>';
							
						}
					
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