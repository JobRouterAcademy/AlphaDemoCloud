<?php

class className extends JobRouter\Engine\Runtime\PhpFunction\RuleExecutionFunction
{
	public function execute($rowId = null)	{
		
        $subtable = 'ST_OPEN_AI_EMAIL';
        $subtableRowIds = $this->getSubtableRowIds($subtable);
        
        if (count($subtableRowIds) >= 2) {
            
            $secondRowId = $subtableRowIds[1]; 
            $jsonContent = $this->getSubtableValue($subtable, $secondRowId, 'OPEN_AI_TEXT', false);
            $decodedContent = json_decode($jsonContent, true);
            
            if (is_array($decodedContent)) {
                
                $this->setTableValue('AI_DEPARTMENT', $decodedContent['department']);
                $this->setTableValue('AI_PRIORITY', $decodedContent['priority']);
                $this->setTableValue('AI_SUMMARY', $decodedContent['summary']);
            } else {
                echo "Es gab ein Problem beim Decodieren des JSON-Inhalts.";
            }
        } else { 
            
        }

	}
}
?>