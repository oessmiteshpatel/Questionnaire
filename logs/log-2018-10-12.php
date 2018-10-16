<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-12 10:04:33 --> Query error: Unknown column 'can.CAnswerId' in 'on clause' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `cans`.`CAnswerId`, `can`.`JobPositionId`, `job`.`JobPositionName`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`CAnswerId` = `can`.`CAnswerId`
ERROR - 2018-10-12 10:05:12 --> Query error: Unknown column 'can.CAnswerId' in 'field list' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`CAnswerId`, `can`.`JobPositionId`, `job`.`JobPositionName`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`CAnswerId` = `can`.`CAnswerId`
ERROR - 2018-10-12 10:06:20 --> Query error: Unknown column 'can.CAnswerId' in 'on clause' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`, `cans`.`CAnswerId`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`CAnswerId` = `can`.`CAnswerId`
ERROR - 2018-10-12 10:06:30 --> Query error: Unknown column 'can.CAnswerId' in 'on clause' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`CAnswerId` = `can`.`CAnswerId`
ERROR - 2018-10-12 10:12:59 --> Query error: Unknown column 'can.CAnswerId' in 'on clause' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`, `cans`.`CAnswerId`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`CAnswerId` = `can`.`CAnswerId`
ERROR - 2018-10-12 10:14:03 --> Query error: Unknown column 'can.CAnswerId' in 'on clause' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`, `cans`.`CAnswerId`, `cans`.`CAnswer`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`CAnswerId` = `can`.`CAnswerId`
ERROR - 2018-10-12 10:26:25 --> Query error: Column 'QuestionId' in field list is ambiguous - Invalid query: SELECT `QuestionId`, `QAnswerId`, `QLabel`, `QValue`, "" as `CAnswer`, `canswer`.`CAnswerId`, `canswer`.`CAnswer`
FROM `tblquestionanswer`
LEFT JOIN `tblcandidateanswer` `canswer` ON `canswer`.`CandidateId` = `can`.`CandidateId`
WHERE `QuestionId` = '1'
ERROR - 2018-10-12 10:35:24 --> Query error: Unknown column 'canswer.CandidateId' in 'on clause' - Invalid query: SELECT `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`QLabel`, `canswer`.`QValue`, "" as `CAnswer`
FROM `tblquestionanswer` `canswer`
LEFT JOIN `tblcandidate` `can` ON `can`.`CandidateId` = `canswer`.`CandidateId`
WHERE `QuestionId` = '1'
ERROR - 2018-10-12 10:37:59 --> Query error: Unknown column 'canswer.CAnswer' in 'field list' - Invalid query: SELECT `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`QLabel`, `canswer`.`QValue`, `canswer`.`CAnswer`
FROM `tblquestionanswer` `canswer`
LEFT JOIN `tblcandidate` `can` ON `can`.`CandidateId` = `canswer`.`CandidateId`
WHERE `canswer`.`QuestionId` = '1'
ERROR - 2018-10-12 10:38:07 --> Query error: Unknown column 'canswer.CAnswer' in 'field list' - Invalid query: SELECT `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`QLabel`, `canswer`.`QValue`, `canswer`.`CAnswer`
FROM `tblquestionanswer` `canswer`
LEFT JOIN `tblcandidate` `can` ON `can`.`CandidateId` = `canswer`.`CandidateId`
WHERE `canswer`.`QuestionId` = '1'
ERROR - 2018-10-12 10:39:04 --> Query error: Unknown column 'canswer.CAnswer' in 'field list' - Invalid query: SELECT `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`QLabel`, `canswer`.`QValue`, `canswer`.`CAnswer`, `can`.`CandidateId`
FROM `tblquestionanswer` `canswer`
LEFT JOIN `tblcandidate` `can` ON `can`.`CandidateId` = `canswer`.`CandidateId`
WHERE `canswer`.`QuestionId` = '1'
ERROR - 2018-10-12 10:42:47 --> Query error: Unknown column 'canswer.CAnswer' in 'field list' - Invalid query: SELECT `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`QLabel`, `canswer`.`QValue`, `canswer`.`CAnswer`, `can`.`CandidateId`
FROM `tblquestionanswer` `canswer`
LEFT JOIN `tblcandidate` `can` ON `can`.`CandidateId` = `canswer`.`CandidateId`
LEFT JOIN `tblcandidateanswer` `tblcan` ON `tblcan`.`CandidateId` = `can`.`CandidateId`
WHERE `canswer`.`QuestionId` = '1'
ERROR - 2018-10-12 10:44:01 --> Query error: Unknown column 'canswer.CandidateId' in 'on clause' - Invalid query: SELECT `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`QLabel`, `canswer`.`QValue`, `tblcan`.`CAnswer`, `tblcan`.`CandidateId`
FROM `tblquestionanswer` `canswer`
LEFT JOIN `tblcandidate` `can` ON `can`.`CandidateId` = `canswer`.`CandidateId`
LEFT JOIN `tblcandidateanswer` `tblcan` ON `tblcan`.`CandidateId` = `can`.`CandidateId`
WHERE `canswer`.`QuestionId` = '1'
ERROR - 2018-10-12 10:54:26 --> Query error: Unknown column 'canans.QuestionName' in 'field list' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`, `canans`.`QuestionId`, `canans`.`QuestionName`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `canans` ON `canans`.`CandidateId` = `can`.`CandidateId`
ERROR - 2018-10-12 10:57:08 --> Query error: Unknown column 'canans.QuestionName' in 'field list' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`, `canans`.`CAnswerId`, `canans`.`QuestionId`, `canans`.`QuestionName`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `canans` ON `canans`.`CandidateId` = `can`.`CandidateId`
ERROR - 2018-10-12 10:57:54 --> Query error: Unknown column 'canans.QuestionName' in 'field list' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`, `canans`.`CAnswerId`, `canans`.`QuestionId`, `canans`.`QuestionName`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `canans` ON `canans`.`CandidateId` = `can`.`CandidateId`
ERROR - 2018-10-12 11:01:52 --> Undefined property: stdClass::$QuestionId at line no 106 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:01:52 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 106, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:01:52')
ERROR - 2018-10-12 11:03:26 --> Undefined property: stdClass::$QuestionId at line no 105 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:03:26 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 105, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:03:26')
ERROR - 2018-10-12 11:12:13 --> Undefined property: stdClass::$QuestionId at line no 106 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:12:13 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 106, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:12:13')
ERROR - 2018-10-12 11:17:40 --> Undefined property: stdClass::$QuestionId at line no 103 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:17:40 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 103, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:17:40')
ERROR - 2018-10-12 11:20:26 --> Undefined property: stdClass::$QuestionId at line no 103 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:20:26 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 103, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:20:26')
ERROR - 2018-10-12 11:20:43 --> Undefined property: stdClass::$QuestionId at line no 103 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:20:43 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 103, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:20:43')
ERROR - 2018-10-12 11:23:07 --> Undefined property: stdClass::$QuestionId at line no 106 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:23:07 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 106, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:23:07')
ERROR - 2018-10-12 11:23:31 --> Undefined property: stdClass::$QuestionId at line no 105 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:23:31 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 105, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:23:31')
ERROR - 2018-10-12 11:32:29 --> Undefined property: stdClass::$QuestionId at line no 107 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:32:29 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 107, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:32:29')
ERROR - 2018-10-12 11:32:56 --> Undefined property: stdClass::$QuestionId at line no 107 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:32:56 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 107, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:32:56')
ERROR - 2018-10-12 11:41:07 --> Query error: Unknown column 'can.QuestionId' in 'on clause' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`QuestionId` = `can`.`QuestionId`
ERROR - 2018-10-12 11:42:18 --> Query error: Unknown column 'can.QuestionId' in 'on clause' - Invalid query: SELECT `can`.`CandidateId`, `can`.`CandidateName`, `can`.`CandidateEmail`, `can`.`PhoneNumber`, `can`.`JobPositionId`, `job`.`JobPositionName`, `cans`.`CAnswerId`
FROM `tblcandidate` `can`
LEFT JOIN `tblmstjobposition` `job` ON `job`.`JobPositionId` = `can`.`JobPositionId`
LEFT JOIN `tblcandidateanswer` `cans` ON `cans`.`QuestionId` = `can`.`QuestionId`
ERROR - 2018-10-12 11:44:40 --> Undefined property: stdClass::$QuestionId at line no 108 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:44:40 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 108, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:44:40')
ERROR - 2018-10-12 11:45:35 --> Undefined property: stdClass::$QuestionId at line no 108 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:45:35 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 108, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:45:35')
ERROR - 2018-10-12 11:46:16 --> Undefined property: stdClass::$QuestionId at line no 108 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:46:16 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$QuestionId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 108, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:46:16')
ERROR - 2018-10-12 11:50:45 --> Undefined variable: user_data at line no 109 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:50:45 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined variable: user_data', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 109, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:50:45')
ERROR - 2018-10-12 11:51:52 --> Undefined variable: user_data at line no 109 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:51:52 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined variable: user_data', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 109, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:51:52')
ERROR - 2018-10-12 11:52:19 --> Undefined variable: user_data at line no 109 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:52:19 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined variable: user_data', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 109, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:52:19')
ERROR - 2018-10-12 11:52:43 --> Undefined variable: user_data at line no 109 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 11:52:43 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined variable: user_data', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 109, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 11:52:43')
ERROR - 2018-10-12 12:02:35 --> Query error: Unknown column 'question.CAnswer' in 'field list' - Invalid query: SELECT .`question`.`QuestionId`, `question`.`QAnswerId`, `question`.`QLabel`, `question`.`QValue`, `question`.`CAnswer`
FROM `tblquestionanswer` `question`
LEFT JOIN `tblcandidateanswer` `canswer` ON `canswer`.`CandidateId` = `question`.`CandidateId`
WHERE `QuestionId` = '1'
ERROR - 2018-10-12 12:03:03 --> Query error: Unknown column 'question.CAnswer' in 'field list' - Invalid query: SELECT `question`.`QuestionId`, `question`.`QAnswerId`, `question`.`QLabel`, `question`.`QValue`, `question`.`CAnswer`
FROM `tblquestionanswer` `question`
LEFT JOIN `tblcandidateanswer` `canswer` ON `canswer`.`CandidateId` = `question`.`CandidateId`
WHERE `question`.`QuestionId` = '1'
ERROR - 2018-10-12 12:04:02 --> Query error: Unknown column 'question.CAnswer' in 'field list' - Invalid query: SELECT `question`.`QuestionId`, `question`.`QAnswerId`, `question`.`QLabel`, `question`.`QValue`, `question`.`CAnswer`
FROM `tblquestionanswer` `question`
LEFT JOIN `tblcandidateanswer` `canswer` ON `canswer`.`QuestionId` = `question`.`QuestionId`
WHERE `question`.`QuestionId` = '1'
ERROR - 2018-10-12 12:06:19 --> Query error: Unknown column 'question.CAnswer' in 'field list' - Invalid query: SELECT `question`.`QuestionId`, `question`.`QAnswerId`, `question`.`QLabel`, `question`.`QValue`, `canswer`.`QAnswerId`, `question`.`CAnswer`
FROM `tblquestionanswer` `question`
LEFT JOIN `tblcandidateanswer` `canswer` ON `canswer`.`QuestionId` = `question`.`QuestionId`
WHERE `question`.`QuestionId` = '1'
ERROR - 2018-10-12 12:20:40 --> Query error: Unknown column 'question.QuestionId' in 'where clause' - Invalid query: SELECT `canswer`.`CAnswerId`, `canswer`.`QuestionId`
FROM `tblcandidateanswer` `canswer`
WHERE `question`.`QuestionId` = '1'
ERROR - 2018-10-12 12:26:25 --> Query error: Not unique table/alias: 'canswer' - Invalid query: SELECT `canswer`.`CAnswerId`, `canswer`.`CandidateId`, `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`CAnswer`
FROM `tblcandidateanswer` `canswer`
LEFT JOIN `tblcandidateanswer` `canswer` ON `canswer`.`QuestionId` = `question`.`QuestionId`
WHERE `canswer`.`QuestionId` = '1'
ERROR - 2018-10-12 12:26:35 --> Query error: Not unique table/alias: 'canswer' - Invalid query: SELECT `canswer`.`CAnswerId`, `canswer`.`CandidateId`, `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`CAnswer`
FROM `tblcandidateanswer` `canswer`
LEFT JOIN `tblcandidateanswer` `canswer` ON `canswer`.`QuestionId` = `question`.`QuestionId`
WHERE `canswer`.`QuestionId` = '1'
ERROR - 2018-10-12 12:49:40 --> Undefined property: stdClass::$CandidateId at line no 105 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 12:49:40 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$CandidateId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 105, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 12:49:40')
ERROR - 2018-10-12 12:50:11 --> Undefined variable: CandidateId at line no 90 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 12:50:11 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined variable: CandidateId', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 90, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 12:50:11')
ERROR - 2018-10-12 12:51:02 --> Undefined property: stdClass::$Candidate_Id at line no 104 in C:\wamp64\www\HR-Questionnaire-Back\api\application\modules\Candidateuser\models\Candidateuser_model.php
ERROR - 2018-10-12 12:51:02 --> Query error: Table 'hrinquiry.logs' doesn't exist - Invalid query: INSERT INTO `logs` (`errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES (8, 'Notice', 'Undefined property: stdClass::$Candidate_Id', 'C:\\wamp64\\www\\HR-Questionnaire-Back\\api\\application\\modules\\Candidateuser\\models\\Candidateuser_model.php', 104, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '::1', '2018-10-12 12:51:02')
ERROR - 2018-10-12 12:51:27 --> Query error: Unknown column 'question.QuestionId' in 'on clause' - Invalid query: SELECT `canswer`.`CAnswerId`, `canswer`.`CandidateId`, `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`CAnswer`
FROM `tblcandidateanswer` `canswer`
LEFT JOIN `tblquestionanswer` `qans` ON `qans`.`QuestionId` = `question`.`QuestionId`
WHERE `canswer`.`QuestionId` = '1'
AND `canswer`.`CandidateId` = '21'
ERROR - 2018-10-12 09:53:14 --> 404 Page Not Found: ../modules/Candidateuser/controllers/Candidateuser/delete
ERROR - 2018-10-12 10:03:16 --> 404 Page Not Found: ../modules/Candidateuser/controllers/Candidateuser/delete
ERROR - 2018-10-12 10:09:40 --> 404 Page Not Found: ../modules/Candidateuser/controllers/Candidateuser/delete
ERROR - 2018-10-12 10:10:00 --> 404 Page Not Found: ../modules/Candidateuser/controllers/Candidateuser/delete
ERROR - 2018-10-12 10:11:52 --> 404 Page Not Found: ../modules/Candidateuser/controllers/Candidateuser/delete
ERROR - 2018-10-12 10:12:56 --> 404 Page Not Found: ../modules/Candidateuser/controllers/Candidateuser/delete
ERROR - 2018-10-12 10:14:54 --> 404 Page Not Found: ../modules/Candidateuser/controllers/Candidateuser/delete
ERROR - 2018-10-12 18:03:15 --> Query error: Unknown column 'canswer.QLabel' in 'field list' - Invalid query: SELECT `canswer`.`CAnswerId`, `canswer`.`CandidateId`, `canswer`.`QLabel`, `canswer`.`QuestionId`, `canswer`.`QAnswerId`, `canswer`.`CAnswer`
FROM `tblcandidateanswer` `canswer`
LEFT JOIN `tblquestionanswer` `qans` ON `qans`.`QuestionId` = `canswer`.`QuestionId`
WHERE `canswer`.`QuestionId` = '1'
AND `canswer`.`CandidateId` = '27'
