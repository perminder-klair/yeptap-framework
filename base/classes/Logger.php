<?php
class Logger
{
    /**
     * @param YeptapException $exception
     * @param bool $clear
     * @param null $error_files
     */
    public static function newMessage(
        YeptapException $exception,
        $clear = false,
        $error_file = null
    ) {
        if (!isset($error_file))
            $error_file = SERVER_ROOT . APP_DIR . DS . 'logs/exceptions_log.html';

        $message = $exception->getMessage();
        $code = $exception->getCode();
        $file = $exception->getFile();
        $line = $exception->getLine();
        $trace = $exception->getTraceAsString();
        $date = date('M d, Y h:iA');

        $log_message = "<h3>Exception information:</h3>
         <p>
            <strong>Date:</strong> {$date}
         </p>

         <p>
            <strong>Message:</strong> {$message}
         </p>

         <p>
            <strong>Code:</strong> {$code}
         </p>

         <p>
            <strong>File:</strong> {$file}
         </p>

         <p>
            <strong>Line:</strong> {$line}
         </p>

         <h3>Stack trace:</h3>
         <pre>{$trace}
         </pre>
         <br />
         <hr /><br /><br />";

        if( is_file($error_file) === false ) {
            file_put_contents($error_file, '');
        }

        if( $clear ) {
            $content = '';
        } else {
            $content = file_get_contents($error_file);
        }

        file_put_contents($error_file, $log_message . $content);
    }
}