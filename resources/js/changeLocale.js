import Cookies from 'js-cookie';

const languageSelect = $('#language-choice'),
    changeAction = 'change',
    localeKey = 'locale',
    daysExpired = 7;

languageSelect.on(changeAction, (e) => {
    let curLocale = $(e.currentTarget).val();

    Cookies.set(localeKey, curLocale, {expires: daysExpired});

    window.location.reload();
});