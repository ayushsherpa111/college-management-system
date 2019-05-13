<?php 
	class AttendanceTable
	{
		private $headings;
		private $rows =[];
		public function setHeadings($headings)
		{
			$this->headings = $headings;
		}
		public function addRow($row)
		{
			$this->rows[]= $row;
		}
		public function generateTable()
		{
			$html = '<table class="list-table"><thead><tr>';
			foreach ($this->headings as $row) {
					$html.='<th>'.$row.'</th>';
			}
			$html.= "</thead></tr>";
			$html.='<tbody>';
			foreach ($this->rows as $row) {
				$html.='<tr>';
				foreach ($row as $key => $r) {
					if (!is_numeric($key)) {
						if ($key == "student_id") {
							$id = $r;
						}
						$html.='<td>'.$r.'</td>';
						
					}
				}
				$html.='<td><a href="index.php?page=attendance_stat.php&statID='.$id.'">view</a></td>';
				$html.='<td><a href="index.php?page=message.php&msgid='.$id.'" title="Message Student"><i class="fa fa-comments-o fa-color" aria-hidden="true"></i></a></td>';
				$html.='</tr>';
			}
			$html.='</tbody>';
			$html .= '</table>';
			return $html;
		}
	}

?>