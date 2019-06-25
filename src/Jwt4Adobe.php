<?php

use Firebase\JWT\JWT;

class Jwt4Adobe
{
    const SERVER_FQDN = "mc.adobe.io";
    const AUTH_SERVER_FQDN = "ims-na1.adobelogin.com";
    const AUTH_ENDPOINT = "/ims/exchange/jwt/";
    const CREATE_PROFILE_ENDPOINT = "/campaign/profileAndServicesExt/profile/";

    private $clientId = '577bf1498f04427292e9e8c3226701d0';
    private $clientSecret = 'e3713ac3-2146-4507-aea4-8fa831769d2e';
    private $orgId = '02803D7859E7606C0A495D1E@AdobeOrg';
    private $techact = '401171C25D07D50A0A495FE2@techacct.adobe.com';
    private $privateKey = <<<EOD
-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDJPbHvo4U2GISy
A8wumsPuCiW7A9irOFf4XCacHX7hZgdHppZXKxZljUMGIrpS6dQE/v8aLeLaG2N4
YAiHdaQbIvQFJVnnq7es+U3Xges41mEDJ9MW0lslUcyq7x0/IPNouVRwXr69PBS3
MhE2ak44QZWQx13FHUHp1eLbSIZ92z8tmavFo9GppL3TMC7RFBNhANMPrpbZ1gmM
AVDgdogKL4dii8t/yzpRG4IxLVU27+mhQ9XofiPPZ6rvf4TiuHJNIRp6LzI6hq4U
M88vlbu+fYxMEDFggwiPchGA4oN5hpyzjB6LuEsRmPzTsLSddB3FNmcWpOfb7Cn2
JG2V4NWxAgMBAAECggEBAJ105lqIaVxwRrM6gXIdqhwAWJFBazBc/4fWImeYNISL
3jpTv+IoVnfS1ZRha8QgLMJT+qozKQJa17OCAGpsw6Bv8tpr5TJ9i1OOJTfv8Woh
YvqjGGkM4kALBsbgHNQeJhXUnJrnpvpNni/QvuMCvn0J48rKEzZ9s+sQbVYCIykp
E0WXNzLSYjkWnkYE6M+40FGOFtpD7d5xnJgHxNn5nf/kkzsxXzmYhly4izvhHi83
4YuQR5kAFE2xnr3lGHeSuPvoFyOo079iKAjgGtnYencZu97C9JwhTl63M8oKQ4Z7
G/KK2HQ51pdHCP87VC9dgjCDMHTEJv+PRakiN2h6yAECgYEA/8g461pU9ou1sSUm
GQN7/5X7NoQ+NLO/P7Qsv6kCxLdDKtpQYReX7wQW0cMpPSggduae7ZB6Uc7lUVmI
IB+ND20hB6hhsdEkLIrIonOUtNNNd+1qIXa6MTeiTJfe/EX5xPpkJS3qLSdFXzuH
Tv+FaxrTrRRHdipDifQl6T6Uk3ECgYEAyWmUP84PRw4dGkGHXsJA0e550opoGvci
FgdgR64PJXoSHknDpWHhmUu5yyMO9QUBRLjRXTMK+RBJGFFSX4l4r4j6PLeK/GRI
dWZuZrTRfOasdxjKfWQZPwZjRZ4wAKcSLWoaRR2cic4ubk4aV8Erll5axhxsGlvE
p/5cQF7+xkECgYEA3a/KbWloVBr4iaU55NoZQYbbKP/q7kCP1IWzdxXj2V1AsMZw
fgY136m6oWk1t9SsdoEhY6Mh8P+RzzT6/2R5HNKnmvx8V+J9KMHMbMgiLasp7HRv
1LsTWw7t8tZ6JEn91ZRy8ape2W28+XIdrwFVwGOK7OqzmR2+VbWumf5sRXECgYBg
V/2PK81JCupG5fOQE1GYWf+yA3za8T4/1VVr1EnwflzuWhCZKqIUhxGfpux/rd42
dkXH1CO6kdy1IilKA+NT7CzvIEj+hCXY6p+Cx5mxqlHzQkuSAXDGIhMYeRuzJDfg
u3FHgGuhy5uQLhIRyhhEfGvlejEHxr/iMB0GuaobQQKBgC99rr/zkpeGJUl/reM7
HpS02T8AbS9QdDj8t4uGNBeeylO47wJmxPHmDUrjyQwCMm04cc6AD6sgmYXcj0Dr
6HILPUHGR8rox5XvzbsEv/HV/6Cl8nScf80jO191yp6DRozvmK7clOuPSYXl5jS0
M0Y7rl/tOKisYoo2kF9WLUyv
-----END PRIVATE KEY-----
EOD;

    /**
     * Gera o JWT Token para ser usado nas requisições da Adobe Campaign;
     *
     * @return string
     */
    public function getJwtToken()
    {
        $token = array(
            "exp" => time() + 3600, //Válido por 1 hora
            "iss" => $this->orgId,
            "sub" => $this->techact,
            "aud" => "https://" . self::AUTH_SERVER_FQDN . "/c/" . $this->clientId,
            "https://ims-na1.adobelogin.com/s/ent_campaign_sdk" => true
        );

        $jwt = JWT::encode($token, $this->privateKey, 'RS256');
        return $jwt;
    }
}