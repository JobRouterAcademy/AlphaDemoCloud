<?php

class className extends JobRouter\Engine\Runtime\PhpFunction\RuleExecutionFunction
{
	public function execute($rowId = null)
	{
           
        $subtable = 'ST_OPEN_AI_EMAIL';
        $subtableRowIds = $this->getSubtableRowIds($subtable);
        
        
        if (!empty($subtableRowIds)) {
           
            $firstRowId = $subtableRowIds[0]; 
            $currentText = $this->getSubtableValue($subtable, $firstRowId, 'OPEN_AI_TEXT', false);
            
            //Prompt:
            /*
            I have the following departments:\n- Development\n- Sales\n- Support\n- Marketing\n- Academy\n- HR\n- CEO\n\n
            Please answer in just one JSON to which department from this list this email request is assigned, 
            what priority the email has and a summary in 2 sentences. 
            
            The fields in the JSON should always be: 
            department, 
            priority, 
            summary"
            
            */
           
            $newText = "\n\nIch habe folgende Abteilungen:\n- Development\n- Sales\n- Support\n- Marketing\n- Academy\n- HR\n- CEO\n\nBitte antworte in nur einem JSON, zu welcher Abteilung aus dieser Liste diese Email-Anfrage zugewiesen wird, welche Priorität die EMail hat und eine Zusammenfassung in 2 Sätzen. Die Felder im JSON sollen immer sein: department, priority, summary";
        
            $updatedText = $newText . "\n```\n" . $currentText . "\n```"; 
        
            $this->setSubtableValue($subtable, $firstRowId, 'OPEN_AI_TEXT', $updatedText); 
        } else {
            
        }

	}
}
?>