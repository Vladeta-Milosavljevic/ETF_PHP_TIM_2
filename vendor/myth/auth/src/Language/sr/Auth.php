<?php

return [
    // Exceptions
    'invalidModel'              => '{0} модел мора бити учитан као приоритет.',
    'userNotFound'              => 'Не можемо пронаћи корисника са ID = {0, number}.',
    'noUserEntity'              => 'Корисников Entity мора бити обезбеђен за валидацију шифре.',
    'tooManyCredentials'        => 'Дозвољена је валидација само 1 креденцијала у односу на шифру.',
    'invalidFields'             => '"{0}" поље не може бити коришћено за валидацију података.',
    'unsetPasswordLength'       => 'Морате подесити `minimumPasswordLength` подешавања у Auth config file.',
    'unknownError'              => 'Открили смо проблем у слању мејла. Молимо, покушајте касније.',
    'notLoggedIn'               => 'Морате бити улоговани како би имали приступ овој страници.',
    'notEnoughPrivilege'        => 'Немате одобрен приступ овој страници.',

    // Registration
    'registerDisabled'          => 'Извините, тренутно нису дозвољени нови корисници.',
    'registerSuccess'           => 'Добро дошли! Улогујте се са новим подацима.',
    'registerCLI'               => 'Направљен нови корисник: {0}, #{1}',

    // Activation
    'activationNoUser'          => 'Не постоји корисник са тим активационим кодом.',
    'activationSubject'         => 'Активирајте Ваш налог',
    'activationSuccess'         => 'Молим Вас потврдите налог кликом на активациони линк у мејлу који смо Вам послали.',
    'activationResend'          => 'Поново пошаљите активациони мејл.',
    'notActivated'              => 'Корисник још није активиран.',
    'errorSendingActivation'    => 'Није могуће послати активациони мејл на: {0}',

    // Login
    'badAttempt'                => 'Погрешно унети подаци. Проверите податке.',
    'loginSuccess'              => 'Добро дошли на студентски портал!',
    'invalidPassword'           => 'Погрешно унети подаци. Проверите шифру.',

    // Forgotten Passwords
    'forgotDisabled'            => 'Опција за промену шифре је онемогућена.',
    'forgotNoUser'              => 'Не моћемо да пронађемо корисника са овом мејл адресом.',
    'forgotSubject'             => 'Инструкције за промену шифре',
    'resetSuccess'              => 'Ваша шифра је успешно промењена. Молим Вас, улогујте се са новом шифром.',
    'forgotEmailSent'           => 'Сигурносни токен Вам је послат на мејл. Унесите токен у поље испод како бисте наставили.',
    'errorEmailSent'            => 'Немогућност слања мејла са промењеном шифром за: {0}',
    'errorResetting'            => 'Немогућност слања реетованих података за {0}',

    // Passwords
    'errorPasswordLength'       => 'Шифра мора да садржи најмање {0, number} карактера.',
    'suggestPasswordLength'     => 'Дужина шифре - до 255 карактера - унестите сигурнију шифру коју ћете лако запамтити.',
    'errorPasswordCommon'       => 'Шифра не сме бити учесталог карактера.',
    'suggestPasswordCommon'     => 'Шифра је проверена са 65.000 уобичајених шифри или шифри које су слабе заштите.',
    'errorPasswordPersonal'     => 'Шифре не могу садржати re-hashed личне податке.',
    'suggestPasswordPersonal'   => 'Варијације Ваше мејл адресе или корисничког имена не бисте требали да користите као шифру.',
    'errorPasswordTooSimilar'    => 'Шифра је превише слична корисничком имену.',
    'suggestPasswordTooSimilar'  => 'Не користите делове корисничког имена у склопу шифре.',
    'errorPasswordPwned'        => 'Ваша шифра {0} је откривена током пробоја заштите {1, number} пута у {2} компромитованих шифри.',
    'suggestPasswordPwned'      => '{0} не бисте требали да користите као шифру. Ако је пак користите, промените је одмах.',
    'errorPasswordPwnedDatabase' => 'база података',
    'errorPasswordPwnedDatabases' => 'базе података',
    'errorPasswordEmpty'        => 'Унесите шифру.',
    'passwordChangeSuccess'     => 'Шифра успешно промењена',
    'userDoesNotExist'          => 'Шифра није промењена. Корисник не постоји',
    'resetTokenExpired'         => 'Извините. Ваш токен је истекао.',

    // Groups
    'groupNotFound'             => 'Немогућност проналаска групе: {0}.',

    // Permissions
    'permissionNotFound'        => 'Немогућност проналаска пермисије: {0}',

    // Banned
    'userIsBanned'              => 'Корисник нема приступ. Контактирајте администратора',

    // Too many requests
    'tooManyRequests'           => 'TПревише захтева. Молим Вас сачекајте {0, number} секунди.',

    // Login views
    'home'                      => 'Насловна страна',
    'current'                   => 'Тренутна страна',
    'forgotPassword'            => 'Заборавили сте шифру?',
    'enterEmailForInstructions' => 'Нема проблема! Унесите Ваш мејл испод и ми ћемо Вам послати инструкције за промену шифре.',
    'email'                     => 'Мејл',
    'emailAddress'              => 'Мејл адреса',
    'sendInstructions'          => 'Пошаљи инструкције',
    'loginTitle'                => 'Пријавите се',
    'loginAction'               => 'Улаз',
    'rememberMe'                => 'Запамти ме',
    'needAnAccount'             => 'Немате налог?',
    'forgotYourPassword'        => 'Заборавили сте шифру?',
    'password'                  => 'Шифра',
    'repeatPassword'            => 'Поновите шифру',
    'emailOrUsername'           => 'Мејл или корисничко име',
    'username'                  => 'Корисничко име',
    'register'                  => 'Региструјте се',
    'signIn'                    => 'Пријавите се',
    'alreadyRegistered'         => 'Већ регистровани?',
    'weNeverShare'              => 'Нећемо делити Ваш мејл.',
    'resetYourPassword'         => 'Промените шифру',
    'enterCodeEmailPassword'    => 'Унесите код који сте добили путем мејла, Ваш мејл, и Вашу нову шифру.',
    'token'                     => 'Toкен',
    'newPassword'               => 'Нова шифра',
    'newPasswordRepeat'         => 'Поновите Вашу нову шифру',
    'resetPassword'             => 'Промените шифру',
];
