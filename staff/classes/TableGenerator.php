<?php 
	class AssignTableGenerator
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
			$html = '<table class="list-table" id ="attendaceTable"><thead><tr>';
			foreach ($this->headings as $row) {
				
					$html.='<th>'.$row.'</th>';
				
			}
			$html.= "</thead></tr>";
			$html.='<tbody>';
			foreach ($this->rows as $row) {
				$html.='<tr>';
				foreach ($row as $key => $r) {
				
					if (!is_numeric($key)) {
						$html.='<td>'.$r.'</td>';
					}
				}
				$html.='</tr>';
			}
			$html.='</tbody>';
			$html .= '</table>';
			return $html;
		}
	}

?>