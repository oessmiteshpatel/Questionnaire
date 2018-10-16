<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-15 14:43:44 --> Query error: Expression #3 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'hrinquiry.qans.QLabel' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `canswer`.`CAnswerId`, `canswer`.`CandidateId`, `qans`.`QLabel`, `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`CAnswer`
FROM `tblcandidateanswer` `canswer`
LEFT JOIN `tblquestionanswer` `qans` ON `qans`.`QuestionId` = `canswer`.`QuestionId`
WHERE `canswer`.`QuestionId` = '1'
AND `canswer`.`CandidateId` = '32'
GROUP BY `canswer`.`CAnswerId`
