# Below is a set of goals and rules to guide us through the infinite ocean of possibilities called PHP
# Encrypted in Polish for security reasons

Temat projektu: Portal randkowy dla matematyków

-Użytkownik, by korzystać z portalu, musi być zalogowany. Ma wtedy możliwość skonfigurowania swojego profilu (np. wybór ulubionej funkcji, liczby itd.) i wylogowania się

-Każdy użytkownik może rozpocząć rozwiązywanie zagadek matematycznych z różnych dziedzin. Liczba rozwiązanych zadań jest zapisywana i przypisywana do profilu użytkownika.

-Użytkownicy mają możliwość wyszukiwania innych podług wprowadzonych preferencji, takich jak ulubiona dziedzina matematyki czy ilość rozwiązanych zadań. Następnie mogą wybrać z listy osoby, które wzbudziły ich zainteresowanie - jeśli drugi użytkownik również wybrał tę osobę, otrzymują oni powiadomienie i możliwość wspólnego chatowania




Po postawieniu repo po raz pierwszy, komenda:
git branch --set-upstream-to origin
wykonana na branchce master ustawia nas do końca życia :)

Krótki poradnik krok po kroku jak zepsuć komuś dzień:

1. Będąc na branchce master robimy git pull
2. Tworzymy branchkę: git checkout -b PRDM-1 (Gdzie PRDM-1 to nazwa branchki, Jira: Przesuwamy ticket PRDM-1 na "In Progress")
3. Działamy na branchce, commitujemy ile dusza pragnie
4. Kiedy zakończyliśmy: Upewniamy się, że pod "git status" nie mamy żadnych niezapisanych zmian i na branchce PRDM-1 robimy merge lub rebase z mastera (ja używam: git merge master, lecz oba sposoby są koszerne)
5. Jeżeli wystąpiły konflikty, rozwiązujemy je w czymkolwiek, byle nie VIMie, i commitujemy. ZAWSZE commit w którym mergujemy/rebasujemy musi się nazywać tak, żeby było jasne, że w tym commicie to robimy (i TYLKO to - nie dodajemy zmian innych niż rozwiązywanie konfliktów)
6. git push i sprawdzamy, czy przechodzą testy w pipeline'ach - jeśli nie, należy to zmienić
7. Na bitbucketcie tworzymy pull request (w tytule: "[PRDM-<ID>] <Tytuł>" i czekamy na frajera, który się poświęci i zrobi nam code review
8. Gdy dostaliśmy komentarze, wróć do kroku 3 i wprowadź poprawki
9. Gdy dostaliśmy approve, możemy śmiało mergować ZAWSZE WYBIERAJĄC SQUASH POD "MERGE STRATEGY".
10. Przesuwamy taska na complete i fajrancik


Zasady Savoir-vivre:

1. Nazywamy branchki zawsze z numerem taska
2. Commity mają mówić, co w nich jest - w granicach rozsądku ofc
3. Coś wymaga opisu większego, niż commit message - dodajemy komentarz w pull requeście i wyjaśniamy o co kiemon
4. Staramy się robić w miarę szybko review oraz nie zasypujemy wszyscy jednej osoby review requestami
5. ZAWSZE squashujemy, chyba, że mamy bardzo dobre argumenty przeciw temu
6. NIGDY nie pushujemy do mastera
7. Minimalizujemy komentarze w kodzie - jeśli musimy coś komentować to w 90% przypadków jest to po prostu źle napisane
8. Zanim zaczniesz robić taska upewnij się, że podpiąłoś się już pod taska i nikt nie zacznie dublować Twojej pracy
9. Widzisz, że coś nie działa, coś trzeba dodać - śmiało dodawaj taska
10. Można się wyzywać w review, ale tylko w granicach rozsądku
11. Nie dodajemy do repo zbędnych plików pokroju pliki automatycznie generowane, VENDORY, pliki środowiska itd.
12. JS to g$wno		# TODO: remove
13. Do każdego taska (Naturalnie, o ile ma to sens, wszak winszuję testującym CSSy) robimy od razu unit testy
14. Deploy w piątek jest wręcz wskazany. Gdybyśmy kiedyś mieli to deployować. God please no.
