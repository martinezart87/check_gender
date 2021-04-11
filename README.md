# Check Gender

Check Gender to aplikacja, która komunikuje się z dwoma REST API:

- REST COUNTRIES (http://restcountries.eu/)
- Genderize (https://genderize.io/)

Na podstawie wprowadzonych w formularzu danych (imienia oraz kraju) wyświetlana jest najbardziej prawdopodobna płeć.

Aplikację wykonano w:
- PHP 7.4 
- Laravel

## Demo

http://mswierczek.sldc.pl/check_gender/

## Lokalne uruchomienie

Aplikację można uruchomić za pomocą wbudowanego serwera programistycznego wykonując w konsoli polecenie:

php artisan serve

Do aplikacji dodano również w katalogu głównym pliki index.php oraz .htaccess, dzięki czemu aplikacja może zostać uruchomiona na innych zewnętrznych lub lokalnych serwerach (np. XAMPP) 
