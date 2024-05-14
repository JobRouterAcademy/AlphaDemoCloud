<?php

class className extends JobRouter\Engine\Runtime\PhpFunction\RuleExecutionFunction
{
	public function execute($rowId = null)	{
		
        $subtable = 'ST_OPEN_AI_EMAIL';
        $subtableRowIds = $this->getSubtableRowIds($subtable);
        
        // Überprüfen ob mindestens zwei IDs vorhanden sind
        if (count($subtableRowIds) >= 2) {
            
            $secondRowId = $subtableRowIds[1]; 
            $textFromSecondRow = $this->getSubtableValue($subtable, $secondRowId, 'OPEN_AI_TEXT', false);
            $this->setTableValue('AI_DEPARTMENT', $textFromSecondRow);
        } else { 
            
        }

	}
}
?>