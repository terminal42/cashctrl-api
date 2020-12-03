<?php

declare(strict_types=1);

namespace Terminal42\CashctrlApi\Entity;

class PersonAddress implements \JsonSerializable
{
    public const TYPE_MAIN = 'MAIN';
    public const TYPE_INVOICE = 'INVOICE';
    public const TYPE_DELIVERY = 'DELIVERY';
    public const TYPE_OTHER = 'OTHER';

    //private const COUNTRIES = [
    //    AFG, ALA, ALB, DZA, ASM, AND, AGO, AIA, ATG, ARG, ARM, ABW, AUS, AUT, AZE, BHS, BHR, BGD, BRB, BLR, BEL, BLZ, BEN, BMU, BTN, BOL, BES, BIH, BWA, BVT, BRA, IOT, BRN, BGR, BFA, BDI, KHM, CMR, CAN, CPV, CYM, CAF, TCD, CHL, CHN, CXR, CCK, COL, COM, COG, COK, CRI, CIV, HRV, CUB, CUW, CYP, CZE, DNK, DJI, DOM, DMA, ECU, EGY, SLV, GNQ, ERI, EST, ETH, FLK, FRO, FJI, FIN, FRA, GUF, GUY, PYF, GAB, GMB, GEO, DEU, GHA, GIB, GRC, GRL, GRD, GLP, GUM, GTM, GGY, GNB, GIN, HTI, HMD, VAT, HND, HKG, HUN, IND, IDN, IRN, IRQ, IRL, IMN, ISR, ITA, JAM, JPN, JEY, JOR, KAZ, KEN, KIR, PRK, KOR, KWT, KGZ, LAO, LVA, LBN, LSO, LBR, LBY, LIE, LTU, LUX, MAC, MKD, MDG, MWI, MYS, MDV, SOM, MLI, MLT, MHL, MTQ, MRT, MUS, MYT, MEX, FSM, MDA, MCO, MNG, MNE, MSR, MAR, MOZ, MMR, NAM, NRU, NPL, NLD, NCL, NZL, NIC, NGA, NER, NIU, NFK, MNP, NOR, OMN, PAK, PLW, PSE, PAN, PNG, PRY, PER, PHL, PCN, POL, PRT, PRI, QAT, REU, ROU, RUS, RWA, BLM, SHN, KNA, LCA, MAF, SPM, VCT, WSM, SMR, STP, SAU, SEN, SRB, SYC, SLE, SGP, SXM, SVK, SVN, SLB, ZAF, SGS, SSD, ESP, LKA, SDN, SUR, SJM, SWZ, SWE, CHE, SYR, TWN, TJK, TZA, THA, TLS, TGO, TKL, TON, TTO, TUN, TUR, TKM, TCA, TUV, UGA, UKR, ARE, GBR, USA, URY, UZB, VUT, VEN, VNM, VIR, VGB, WLF, YEM, ZMB, ZWE, ISL
    //]

    public string $type;
    public ?string $address = null;
    public ?string $zip = null;
    public ?string $city = null;
    public ?string $country = null;

    public function __construct(string $type, string $address = null, string $zip = null, string $city = null, string $country = null)
    {
        $this->type = $type;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
    }

    //public function getIsoCountry(): string
    //{
    //
    //}
    //
    //public function setIsoCountry(string $isoCode): string
    //{
    //
    //}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'address' => $this->address,
            'zip' => $this->zip,
            'city' => $this->city,
            'country' => $this->country,
        ]);
    }
}
