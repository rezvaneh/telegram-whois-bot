<?php

$message = file_get_contents('php://input');

require 'vendor/autoload.php';
include 'Database/DB.php';

$api_token = '336990963:AAEP_0yZ9bQm2-G9C3qGwftwWK2OtbfGXXo';

$tg = new Smoqadam\Telegram($api_token);
$whois = new Smoqadam\Whois();

$tg->cmd('\/start', function ($domain) use ($tg, $whois) {
    $keyboard = ['keyboard' => [
        [['text' => "\xE2\x9C\x85".' کوتینت'], ['text' => "\xF0\x9F\x94\x8E".' بررسی دامنه'], ['text' => "\xE2\x9D\x93".'راهنما']],
        ],
        'resize_keyboard' => true,
    ];

    $text = '
    سلام دوست عزیز
این ربات به منظور بررسی ثبت یا عدم ثبت یک دامنه با پسوند های مختلف در وب سایت های مرجع ایجاد شده است.
استفاده از این ربات بسیار سادست، تنها کافی است بر روی دکمه  🔎بررسی دامنه  کلیک کنید و سپس در باکس متن نامه دامنه خود را به همراه پسوند مربوطه تایپ کنید و ارسال کنید. پاسخ ربات به دو صورت است:
<a href="http://cotint.ir">&#160;</a>
1. این دامنه قبلا ثبت نشده است و شما میتوانید برای ثبت آن از طریق لینک زیر اقدام نمایید:
<a href="https://my.mihanwebhost.com/domainchecker.php">ثبت دامنه</a>
2. مشخصات مالک دامنه از وب سایت مرجع Whois

در صورتی که نیاز به مشاوره و راهنمایی دارید، از طریق زیر میتوانید با ما ارتباط برقرار کنید:
🔽🔽🔽🔽🔽
✅ Cotint.ir
☎️ 021-22035976
💌 info@cotint.ir';

    $parse_mode = $tg::PARSE_HTML;
    $tg->sendMessage(
        $text,
        $tg->getChatId(),
        null,
        null,
        $keyboard,
        $parse_mode
    );
});

/*
 * send about bot
 */
$tg->cmd("\xE2\x9D\x93".'راهنما', function ($domain) use ($tg, $whois) {
    $keyboard = ['keyboard' => [
        [['text' => "\xE2\x9C\x85".' کوتینت'], ['text' => "\xF0\x9F\x94\x8E".' بررسی دامنه'], ['text' => "\xE2\x9D\x93".'راهنما']],
    ],
        'resize_keyboard' => true,
    ];

    $text = '
    سلام دوست عزیز
این ربات به منظور بررسی ثبت یا عدم ثبت یک دامنه با پسوند های مختلف در وب سایت های مرجع ایجاد شده است.
استفاده از این ربات بسیار سادست، تنها کافی است بر روی دکمه  🔎بررسی دامنه  کلیک کنید و سپس در باکس متن نامه دامنه خود را به همراه پسوند مربوطه تایپ کنید و ارسال کنید. پاسخ ربات به دو صورت است:
<a href="http://cotint.ir">&#160;</a>
1.این دامنه قبلا ثبت نشده است و شما میتوانید برای ثبت آن از طریق لینک زیر اقدام نمایید:
<a href="https://my.mihanwebhost.com/domainchecker.php">ثبت دامنه</a>

2. مشخصات مالک دامنه از وب سایت مرجع Whois

در صورتی که نیاز به مشاوره و راهنمایی دارید، از طریق زیر میتوانید با ما ارتباط برقرار کنید:
🔽🔽🔽🔽🔽
✅ Cotint.ir
☎️ 021-22035976
💌 info@cotint.ir';
    $parse_mode = $tg::PARSE_HTML;
    $tg->sendMessage($text, $tg->getChatId(),
        null,
        null,
        $keyboard,
        $parse_mode
    );
});

/*
 * send about cotint
 */
$tg->cmd("\xE2\x9C\x85".' کوتینت', function ($domain) use ($tg, $whois) {
    $keyboard = ['keyboard' => [
        [['text' => "\xE2\x9C\x85".' کوتینت'], ['text' => "\xF0\x9F\x94\x8E".' بررسی دامنه'], ['text' => "\xE2\x9D\x93".'راهنما']],
    ],
        'resize_keyboard' => true,
    ];

    $text = '🔖 گروه طراحی وب سایت کوتینت
تمرکز اصلی فعالیت های مجموعه <a href="http://cotint.ir">کوتینت</a> از سال 1389 تاکنون در زمینه طراحی سیستم های اطلاعاتی، وب اپلیکیشن، موبایل اپلیکیشن، وب سایت، ربات ها، دیجیتال مارکتینگ، مدیریت محتوای شبکه های اجتماعی و ... بوده است.
نگاه ما به زندگی در شعار ما خلاصه می شود: 

There is No Tomorrow
فردایی وجود نخواهد داشت

با ما در ارتباط باشید
✅ Cotint.ir
- - - - - - - - - - - - -
📩 info@cotint.ir
📞 021-22035976
📢 @cotint';

    $parse_mode = $tg::PARSE_HTML;
    $tg->sendMessage($text, $tg->getChatId(),
        null,
        null,
        $keyboard,
        $parse_mode);
});

/*
 * get the domain information
 */
$tg->cmd("\xF0\x9F\x94\x8E".' بررسی دامنه', function ($domain) use ($tg, $whois) {
    $keyboard = ['hide_keyboard' => true];
    $help = 'لطفا دامنه خود را وارد کنید.';
    $parse_mode = $tg::PARSE_HTML;
    $tg->sendMessage($help, $tg->getChatId(),
        null,
        null,
        $keyboard,
        $parse_mode);
});

$tg->cmd('<<:any>>', function ($domain) use ($tg, $whois) {
    if (!preg_match('/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/', $domain)) {
        $keyboard = ['hide_keyboard' => true];
        $parse_mode = $tg::PARSE_HTML;
        $tg->sendMessage('دامنه صحیح وارد کنید.', $tg->getChatId(),
            null,
            null,
            $keyboard,
            $parse_mode);

        return;
    } else {
        $database = new DB();
        $conn = $database->PDO();
        $stmt = $conn->prepare('INSERT INTO users(chatId, domain, created_at) VALUES(:chatId, :dom, :dates)');
        $stmt->bindParam('chatId', $tg->getChatId());
        $stmt->bindParam('dom', $domain);
        $stmt->bindParam('dates', date('Y-m-d', time()));
        $stmt->execute();

        $keyboard = ['keyboard' => [
            [['text' => "\xE2\x9C\x85".' کوتینت'], ['text' => "\xF0\x9F\x94\x8E".' بررسی دامنه'], ['text' => "\xE2\x9D\x93".'راهنما']],
        ],
            'resize_keyboard' => true,
        ];
        $parse_mode = $tg::PARSE_HTML;
        $result = $whois->isAvailable($domain);
        if ($result) {
            $text = 'این دامنه قبلا ثبت نشده است و شما میتوانید برای ثبت آن از طریق لینک زیر اقدام نمایید:
<a href="https://my.mihanwebhost.com/domainchecker.php">ثبت دامنه</a>
';
            $tg->sendMessage($text, $tg->getChatId(), null, null, $keyboard, $parse_mode);
        } else {
            $result = $whois->getDomainInfo($domain);
            $tg->sendMessage($result, $tg->getChatId(), null, null, $keyboard, $parse_mode);
        }
    }
});

//check availability
/*$tg->cmd('check', function ($domain) use ($tg, $whois) {
    if (!strlen($domain)) {
        $tg->sendMessage('/check [domain name] check if a domain available for register or not', $tg->getChatId());

        return;
    }

    $result = $whois->isAvailable($domain);

    if (!$result) {
        $tg->sendMessage($domain.' is not availble', $tg->getChatId());
    } else {
        $tg->sendMessage($result.' is available', $tg->getChatId());
    }
});*/

$tg->process(json_decode($message, true));
