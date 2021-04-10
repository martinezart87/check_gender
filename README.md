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

Jeżeli jest zainstalowany pakiet Laravela to za pomocą composera wykonać polecenie uruchamiające serwer:

php artisan serve

Jeżeli chcesz uruchomić projekt na innym lokalnym serwerze, np XAMPP, to musisz zmienić nazwę pliku:
server.php na index.php. Plik znajduje się w katalogu głównym.
