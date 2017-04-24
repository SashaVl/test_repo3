<?php
class vars{

    /*
    * IdPaese - поле должно содержать, в соответствии
     * со стандартом ISO 3166-1 альфа-2-код, код страны,
     * который присвоен фискальная идентификация субъекта
    */
    const ID_PAESE = "IT";
    const NAZIONE = "IT";

    /*
     * idCodice - поле должно содержать налоговый кодекс передатчик; во всех остальных случаях
     * (резидент за границей) сусло содержат налоговый идентификатор,
     * который отправитель был назначенным родная страна.
     */
    const ID_CODICE = "01662570702";

    /*
     * $progressivoInvio - содержит идентификацию буквенно-цифровой передаваемых файлов,
     * оставляется оценки пользователя в соответствии с необходимостью,
     * однако в соблюдении указанных характеристик из схемы XSD
     */
    const PROGRESSIVO_INVIO = "41";

    /*
     *  FormatoTrasmissione - Критерии для продвижения по службе: принимает фиксированное значение
     */
    const FORMATO_TRANSMISSIONE = "FPA12";

    /*
     * CodiceDestinatario - поле должно содержать код из 6 символов,
     * Это из IndicePA включая информацию о службе биллинга электроника,
     * связанный с этой должностью, в администрации имя,
     * выполняет функцию приема (и, возможно, обработки) счет-фактура.
     */
    const CODICE_DESTINATARIO = "UF2HA8";

    /*
     * CodiceFiscale - поле, в случае его использования, должны содержать
     * Налоговый кодекс отчуждателя / кредитор, который будет состоять из 11 символов
     * численные, в случае юридических лиц, или 16 символов
     * буквенно-цифровой, случай физического лица.
     */
    const CODICE_FISCALE = "01662570702";

    /*
     * RegimeFiscale - поле должно содержать один из кодов,
     * предусмотренных список соответствующего значения;
     * Кодекс определяет, на основе промышленности коммерческая или прибыль,
     * налоговый режим, в котором передающий / кредитор.
     */
    const REGIME_FISCALE = "RF01";


}