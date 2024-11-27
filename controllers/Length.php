<?php
DEFINE('METER_TO_METER',1);
DEFINE('METER_TO_DECAMETER',10.00000000000000000);
DEFINE('METER_TO_HECTOMETER',100.00000000000000000);
DEFINE('METER_TO_KILOMETER',1000.00000000000000000);
DEFINE('METER_TO_MEGAMETER',1000000.00000000000000000);
DEFINE('METER_TO_GIGAMETER',1000000000.00000000000000000);
DEFINE('METER_TO_TERAMETER',1000000000000.00000000000000000);
DEFINE('METER_TO_PETAMETER',1000000000000000.00000000000000000);
DEFINE('METER_TO_EXAMETER',1000000000000000000.00000000000000000);
DEFINE('METER_TO_ZETTAMETER',1000000000000000000000.00000000000000000);
DEFINE('METER_TO_YOTTAMETER',1000000000000000000000000.00000000000000000);
DEFINE('METER_TO_RONNAMETER',1000000000000000000000000000.00000000000000000);
DEFINE('METER_TO_QUETTAMETER',1E+030);
DEFINE('METER_TO_DECIMETER',0.10000000000000000);
DEFINE('METER_TO_CENTIMETER',0.01000000000000000);
DEFINE('METER_TO_MILLIMETER',0.00100000000000000);
DEFINE('METER_TO_MICROMETER',0.00000100000000000);
DEFINE('METER_TO_NANOMETER',0.00000000100000000);
DEFINE('METER_TO_PICOMETER',0.00000000000100000);
DEFINE('METER_TO_FEMTOMETER',0.00000000000000100);
DEFINE('METER_TO_ATTOMETER',1.E-18);
DEFINE('METER_TO_ZEPTOMETER',1E-021);
DEFINE('METER_TO_YOCTOMETER',1E-024);
DEFINE('METER_TO_RONTOMETER',1E-027);
DEFINE('METER_TO_QUECTOMETER',1E-030);
DEFINE('METER_TO_INCH',0.02540000000000000);
DEFINE('METER_TO_FOOT',0.30480000000000000);
DEFINE('METER_TO_YARD',0.91440000000000000);
DEFINE('METER_TO_MILE',1609.34400000000000000);
DEFINE('METER_TO_LINK',0.20116800000000000);
DEFINE('METER_TO_ROD',5.02920000000000000);
DEFINE('METER_TO_CHAIN',20.11680000000000000);
DEFINE('METER_TO_FURLONG',201.16800000000000000);
DEFINE('METER_TO_LEAGUE',4828.03200000000000000);
DEFINE('METER_TO_US-SURVEY-FOOT',0.304800609601219);
DEFINE('METER_TO_US-SURVEY-MILE',1609.34721869443);
DEFINE('METER_TO_FATHOM',1.82880000000000000);
DEFINE('METER_TO_CABLE-US',219.45600000000000000);
DEFINE('METER_TO_CABLE-INTERNATIONAL',185.2);
DEFINE('METER_TO_NAUTICAL-MILE',1852.00000000000000000);
DEFINE('METER_TO_NAUTICAL-LEAGUE',5556.00000000000000000);
DEFINE('METER_TO_THOU',0.00002540000000000);
DEFINE('METER_TO_BARLEYCORN',0.00846666666666666);
DEFINE('METER_TO_NAIL-CLOTH',0.05715000000000000);
DEFINE('METER_TO_HAND',0.10160000000000000);
DEFINE('METER_TO_SHAFTMENT',0.15240000000000000);
DEFINE('METER_TO_SPAN',0.22860000000000000);
DEFINE('METER_TO_ELL',1.14300000000000000);
DEFINE('METER_TO_TWIP',0.00001763888888888);
DEFINE('METER_TO_POINT',0.00035277777777777);
DEFINE('METER_TO_PICA',0.00423333333333333);
class Length{
    public $commoun_unit = "meter";
    // public $unit_arr = array('meter','decameter','hectometer','kilometer','megameter','gigameter','terameter','petameter','exameter','zettameter','yottameter','ronnameter','quettameter','decimeter','centimeter','millimeter','micrometer','nanometer','picometer','femtometer','attometer','zeptometer','yoctometer','rontometer','quectometer','inch','foot','yard','mile','link','rod','chain','furlong','league','us-survey-foot','us-survey-mile','fathom','cable-us','cable-international','nautical-mile','nautical-league','thou',	'barleycorn','nail-cloth','hand',	'shaftment','span','ell','twip','point','pica');
    // $unit_arr = 'query string unit name' => 'plueral of query string' , 'short_form' ,'other short form','singuler short form' , 'link_text'
    public $unit_arr = array('meter'=>'meters,meters,m,meter,meters',
    'decameter'=>'decameters,dam,dam,dam,decameters',
    'hectometer'=>'hectometers,hm,hm,hm,hectometers',
    'kilometer'=>'kilometers,km,km,km,km',
    'megameter'=>'megameters,Mm,Mm,Mm,megameters',
    'gigameter'=>'gigameters,Gm,Gm,Gm,gigameters',
    'terameter'=>'terameters,Tm,Tm,Tm,terameters',
    'petameter'=>'petameters,Pm,Pm,Pm,petameters',
    'exameter'=>'exameters,Em,Em,Em,exameters',
    'zettameter'=>'zettameters,Zm,Zm,Zm,zettameters',
    'yottameter'=>'yottameters,Ym,Ym,Ym,yottameters',
    'ronnameter'=>'ronnameters,Rm,Rm,Rm,ronnameters',
    'quettameter'=>'quettameters,Qm,Qm,Qm,quettameters',
    'decimeter'=>'decimeters,dm,dm,dm,decimeters',
    'centimeter'=>'centimeters,cm,cm,cm,cm',
    'millimeter'=>'millimeters,mm,mm,mm,mm',
    'micrometer'=>'micrometers,µm,µm,µm,µm',
    'nanometer'=>'nanometers,nm,nm,nm,nanometers',
    'picometer'=>'picometers,pm,pm,pm,picometers',
    'femtometer'=>'femtometers,fm,fm,fm,femtometers',
    'attometer'=>'attometers,am,am,am,attometers',
    'zeptometer'=>'zeptometers,zm,zm,zm,zeptometers',
    'yoctometer'=>'yoctometers,ym,ym,ym,yoctometers',
    'rontometer'=>'rontometers,rm,rm,rm,rontometers',
    'quectometer'=>'quectometers,qm,qm,qm,quectometers',
    'inch'=>'inches,inches,in,inch,inches',
    'foot'=>'feet,feet,ft,foot,feet',
    'yard'=>'yards,yards,yd,yard,yards',
    'mile'=>'miles,miles,mi,mile,miles',
    'link'=>'links,li,li,li,links',
    'rod'=>'rods,rd,rd,rd,rods',
    'chain'=>'chains,ch,ch,ch,chains',
    'furlong'=>'furlongs,fur,fur,fur,furlongs',
    'league'=>'leagues,lea,lea,lea,leagues',
    'us-survey-foot'=>'us survey feet,ft,ft,ft,US survey feet',
    'us-survey-mile'=>'us survey miles,mi,mi,mi,US survey miles',
    'fathom'=>'fathoms,ftm,ftm,ftm,fathoms',
    'cable-us'=>'cables,cb,cb,cb,cable (US)',
    'cable-international'=>'cables,cb,cb,cb,cable (int)',
    'nautical-mile'=>'nautical miles,nmi,nmi,nmi,nautical miles',
    'nautical-league'=>'nautical leagues,nl,nl,nl,nautical leagues',
    'thou'=>'thou,thou,thou,thou,thou',	
    'barleycorn'=>'barleycorns,barleycorn,barleycorn,barleycorn,barleycorn',
    'nail-cloth'=>'nails,nail,nail,nail,nail',
    'hand'=>'hands,hand,hand,hand,hand',	
    'shaftment'=>'shaftments,shaftment,shaftment,shaftment,shaftment',
    'span'=>'spans,span,span,span,span',
    'ell'=>'ells,ell,ell,ell,ell',
    'twip'=>'twips,twip,twip,twip,twip',
    'point'=>'points,pt,pt,pt,points',
    'pica'=>'picas,pica,pica,pica,pica'
    );
    public function vowel($str){
        $vowelArry = array('a','e','i','o','u');
        $prefix = in_array(strtolower(substr($str ,0,1)),$vowelArry)? "an" : "a";
        return $prefix;
    }
    public $footer_arr = array('meter','kilometer','link');
    public $populer_length_arr = array('cm to inches' => '/length/centimeter-to-inch/',
                                        'inches to cm' => '/length/inch-to-centimeter/',
                                        'mm to inches' => '/length/millimeter-to-inch/',
                                        'inches to mm' => '/length/inch-to-millimeter/',
                                        'meters to feet' => '/length/meter-to-foot/',
                                        'feet to meters' => '/length/foot-to-meter/',
                                        'km to miles' => '/length/kilometer-to-mile/',
                                        'miles to km' => '/length/mile-to-kilometer/',
                                        'cm to feet' => '/length/centimeter-to-foot/',
                                        'feet to cm' => '/length/foot-to-centimeter/',
                                        'inches to feet' => '/length/inch-to-foot/',
                                        'feet to inches' => '/length/foot-to-inch/',
                                        'meters to yards' => '/length/meter-to-yard/',
                                        'yards to meters' => '/length/yard-to-meter/',
                                        'mm to cm' => '/length/millimeter-to-centimeter/',
                                        'cm to mm' => '/length/centimeter-to-millimeter/',
                                        'cm to km' => '/length/centimeter-to-kilometer/',
                                        'km to cm' => '/length/kilometer-to-centimeter/',
                                        'mm to feet' => '/length/millimeter-to-foot/',
                                        'feet to mm' => '/length/foot-to-millimeter/',
                                        'meters to miles' => '/length/meter-to-mile/',
                                        'miles to meters' => '/length/mile-to-meter/',
                                        'feet to miles' => '/length/foot-to-mile/',
                                        'miles to feet' => '/length/mile-to-foot/',
                                        'yards to feet' => '/length/yard-to-foot/',
                                        'feet to yards' => '/length/foot-to-yard/',
                                        'inches to meters' => '/length/inch-to-meter/',
                                        'meters to inches' => '/length/meter-to-inch/',
                                        'mm to m' => '/length/millimeter-to-meter/',
                                        'm to mm' => '/length/meter-to-millimeter/',
                                        'km to m' => '/length/kilometer-to-meter/',
                                        'm to km' => '/length/meter-to-kilometer/',
                                        'inches to yards' => '/length/inch-to-yard/',
                                        'yards to inches' => '/length/yard-to-inch/',
                                        'yards to miles' => '/length/yard-to-mile/',
                                        'miles to yards' => '/length/mile-to-yard/');

    function unit_sing_plu($par1,$unit){
        $arr_short = explode(",",$this->unit_arr[$unit]);
        if($par1 == '1'){
            return $unit;
        }else{
            return $arr_short[0];
        }
    }
    function short_sing_plu($par1,$unit){
        $arr_short = explode(",",$this->unit_arr[$unit]);
        if($par1 == '1'){
            return $arr_short[3];
        }else{
            return $arr_short[1];
        }
    }
}
?>

