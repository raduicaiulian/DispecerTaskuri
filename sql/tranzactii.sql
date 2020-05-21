START TRANSACTION; --marchează începutul unei tranzacții
SET autocommit=0; --dezactivează caracteristica de autocommit (scrie direct pe disk fiecare comanda)
SELECT @@autocommit; --vizualizează starea autocommit din cadrul unei tranzacții 
COMMIT; --scrie tranzacția pe disk (inutilă dacă autocommit este activat)