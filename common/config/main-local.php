<?php
return [
    'components' => [
		/* Author -ptr.nov- : Admin Menu  */
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=wan',
            'username' => 'kg',
            'password' =>'4dm1n15tr41t0R',
            'charset' => 'utf8',
        ], 
		
		/* Author -ptr.nov- : Payroll  */
        'db1' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=wan',
            'username' => 'kg',
            'password' =>'4dm1n15tr41t0R',
            'charset' => 'utf8',
        ],
       /* 'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => 'sampoerna',
            'charset' => 'utf8',
        ],
		*/
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
