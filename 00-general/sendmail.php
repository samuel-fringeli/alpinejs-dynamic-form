<?php

define('_JEXEC', 1);

// Define the JPATH_BASE constant if it hasn't been defined already
if (!defined('JPATH_BASE')) {
    // Assume this script is located in the root of the Joomla installation
    $currentScriptPath = __DIR__;
    
    // Look for the "libraries" folder to determine the base path
    while (!is_dir($currentScriptPath . '/libraries')) {
        $currentScriptPath = dirname($currentScriptPath);
        
        // If we reached the top of the directory tree, the Joomla installation wasn't found
        if ($currentScriptPath === '/') {
            die('Error: JPATH_BASE could not be found. Please make sure this script is located within a Joomla installation.');
        }
    }
    
    define('JPATH_BASE', $currentScriptPath);
}

// Include the Joomla framework
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

// Initialize the Joomla application
$app = JFactory::getApplication('site');
$app->initialise();

function sendEmail($to, $subject, $body, $isHtml = true, $attachments = [])
{
    $mailer = JFactory::getMailer();
    $config = JFactory::getConfig();

    // Set sender information
    $sender = [
        $config->get('mailfrom'),
        $config->get('fromname')
    ];
    $mailer->setSender($sender);

    // Set recipient information
    $mailer->addRecipient($to);

    // Add bcc for sender
    $mailer->addBCC($sender);

    // Set email subject and body
    $mailer->setSubject($subject);
    $mailer->setBody($body);

    // Set email format
    if ($isHtml) {
        $mailer->isHtml(true);
    }

    // Add attachments if any
    if (!empty($attachments)) {
        foreach ($attachments as $attachment) {
            $mailer->addAttachment($attachment);
        }
    }

    // Send the email
    $sendResult = $mailer->Send();

    return $sendResult;
}

?>