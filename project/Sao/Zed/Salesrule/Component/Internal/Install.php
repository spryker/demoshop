<?php
/**
 *
 * @author Tom Bullmann
 *
 */
class Sao_Zed_Salesrule_Component_Internal_Install implements ProjectA_Zed_Library_Component_Interface_InstallInterface, ProjectA_Zed_Library_Dependency_Factory_Interface
{

    /**
     * @var Pac_Glossary_factory
     */
    protected $factory;


    protected $promotions = array(
        array(
            'name'         => 'New Signup',
            'description'  => 'A coupon code we will send to certain new signups.',
            'display_name' => 'new_signup',
            'scope'        => 'local',
            'action'       => 'ActionPercent',
            'amount'       => 10,
            'is_active'    => 1,
            'split'        => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NORMAL,
            'code_until'   => '2013-06-27 23:59:59',

            'code_pool'    => ['3236735E0ED7', '092EC8E7FE3F', 'F827E3C872B8', 'F2CD3148C9D8', '68EAEB028C9A', '3C39B5C1D646', '7B879AA6B656', 'A339CF5244A1', 'D2A796F55FCA', 'E459042E6313', '96D89A8233E7', 'D850336B0026', '43E33EE8F996', '14BDF96DE8D8', 'B206057E6490', 'C721BFE48BDC', '787244F2549B', 'DF4362F64101', 'E2661EEBAB7C', 'AE0B8093BF33', 'E8E6D5C51CB5', '781B89367618', 'BB7592B3072B', 'A8DF07E8BC78', '9CCF33041A86', '259FEF941495', '020AD10B7768', '4149341DBBD8', '8615AF567BDC', '225844F06E4D', '472E7B85FF96', 'EBBBEA9D897A', 'F4D9C3F03C53', 'CD871306CE4E', '64240E3F0176', '9C1FF6C1164A', 'C547B38AA5FD', 'ABA679709BC1', '932B7F3B5F5B', '4EC5A5419337', 'BF7BF1B1CF06', 'BC2FEE87B051', '632FC9870A6C', 'BF7063904994', 'A3C72D958300', '13A457D63588', '1FA44D16E005', 'D8C8C33759FD', 'E9377B403F46', 'B1D355559C89', '2F0264E0BDF8', '97D26DA6C97A', '04A0636C4313', '21F00ED590DD', '13A74AAA56C5', '4FCDDFECACC6', '7633BA6EF40A', '4404BFE157C6', '7791E76B3C86', '6C47E266DE22', 'CF78F8AD67DE', '46F5F8AC2AE5', 'CB0DE3D08BC5', '845B364B9830', '80051F56EEAF', 'D20747519322', '5879788F75E7', 'FB92D941E547', 'E7E8C9B7BA62', 'E3C8B413A1BE', '1634486A5D89', '4B558780F5D6', '4EB4B4EFEE12', '77A218A0F8A4', '00A775B9159F', '3A0377F31EF3', '3F4BE33E8FBB', '87C38BC877BE', '9ED413E4B500', 'B8C3954C9483', 'EC09DC1FBF6F', '630FFCFF552D', '855233E1E92B', '5A6C36DFB5E2', 'A1CFDCDF52CB', '62E1472D31D1', '653535C4B07D', '463AAC2D8CA4', '3E350054202B', 'FCF1A57BC6A6', '943FA29908FE', '99A3082F1E3A', '5B80EE2690AC', 'E9178787AA8B', '662DCCCF154C', '75C1C76EC50B', 'EA8BDBDC7C18', '833ED851B639', 'F39E28D4DBD2', 'DB1AEFA38C9D', 'C8399EB899A5', 'CD6C9B0F1703', 'A670DC9D6313', 'F837C1AF9C79', 'FB65C5926522', '49DDBF9D43B2', '55E701526FFE', '3A931ED72D45', '0900AAE8E199', 'C489F2B3FF97', '0A92F7425531', 'E18421BDBBA2', 'D26DE4198087', 'AEC6366D63EF', '23A34F737EFD', 'ED46F3FD18A2', '3E0E89D645FB', 'C03521569CE4', '1F05D8391020', '3F1F1B06FC8E', '1B483DFFE6DD', '144D6C604E8E', '6253618B4208', 'A5E4938C5BE6', 'D938B9C5ABE2', 'AAFDADF8FDBA', '670F85657350', '494DC0A7458B', 'E0DB90ABEC5E', '3290F4420E83', 'EE84DFD1768B', '535A544977F3', 'B4778E6FED48', '6213BBCCFBBF', '58A080B9B5F5', '0B444B0CECDA', 'DF3839A596E1', '516289AA96A4', '1091BFA4F72C', '9B1BC8597F97', '412A9F9F127E', '76FEDBB5E4C2', '6502BDC4868F', 'A39BBAF3008B', '4A1EB30DA4A3', '1294D3BC4CF1', '695D935C80F3', 'B4383B9F2B79', '354EBF20DFD0', 'D69076784278', 'AFA8AD42F68F', '2187ACE04EDB', '8399D631FD79', '78E92B8C3486', 'DE44C4E99A79', '17459386ACB0', 'BB74672E8A06', 'BC172628BE8A', 'F8FD145F568A', 'C5CF764913EC', 'C0B7C7687B0E', '3AFB80746689', 'AE564AF1C1D3', 'A26476FB9817', 'EDA50BBFDC00', '2384E660C1F9', 'F5AAB207631B', '016467B1B923', '76C0B0187E1C', '818D51229ADD', '88A649AB3E36', '346AC3D76F1E', '5F1D39B702EB', '3CD63916E35F', 'E614DFB5FF98', '3F0A9EF7701B', '0B00DC15EE67', 'C07F4A1C9430', '6875B7EFB50C', '1B624F4D3DB0', 'A011162784CC', 'F19AFBB91839', 'E642235B18CD', 'BCE153A87B23', '56216F34E0C7', '8C19AC79BB2A', '34EEA120A930', 'A894D0150FD3', '77944C0C1C7E', 'C49716FF3ADC', 'E2D4ACA94C2E', '13EF47956982', '21BD609F5794', '8A8FA4E75894', '1F58C9BC4115', 'D3B494661F61', '0A8B39FB013B', '36B6DE5DA0E0', '72B514FF24AF', '761AAF0BE8CF', 'BCB4B62077CC', '24FD8460981C', 'D47164B8C21B', 'AD284E70F623', 'C7C85269D2D7', '92A12820AD65', '58511F35DE48', '53237BC81EA2', '77F1CD740DAE', '9A43A70EA181', '2F9B5C1D47ED', 'CD04E5F301DE', 'C32847B4150C', 'DF107659D6A7', 'E5BB85E01ABE', 'EFDE7F854694', '50C0BB817DCC', 'D56F6C12F728', '845091B97C04', 'DCAEB57BC8EC', '75CB39576B01', '17D74DD32DD1', '91F7400BCE70', '46EFA062CCE8', 'FA250BA70668', '0B2588E852B0', 'D6AF35BE3B9C', 'E6BA19879AF1', '73A81F1263CC', '0ED0850840F9', '846A11CE8FF9', '27B9FCB87F6D', 'CDDC3692B179', '94FEDEE880A2', 'BF219D9AF7BB', '4CC903858D12', '77A3E4EB4DD9', '1F37BCAD3F8D', 'F9E4DD5EC40D', 'E0B0C7A3A259', 'D63070E617AC', '0378726E1BF0', 'C42C0A443131', '4F8D9123E4F2', '6374FC688486', 'EC42647B4E97', 'B22A35F41A53', 'FED2B1C04139', '8FE263E5DF89', '11253C3FC800', '80C64D9428DE', 'A9F1BC61A15F', '8169725758A6', '34B525273504', 'CFE04E11607E', '858A4AD85A56', 'BB761AA2EB44', '24714A55CA6E', 'AC1061D512A2', 'AE192384D531', 'CBDC590D16E8', '8D5B06C96E65', '6B15AAE4A174', '9A844FA77C73', 'AD26CB5A3242', '8CBA41215379', 'A288A3C8D999', '765724FD46BC', '517A195AE36D', '9DD708584232', '22D575F181AD', '9131C11C5191', '4BC8CF8D400D', 'D28F7698C0DB', 'A864F1AD0170', '9D8B58392211', '2AF088800632', '4C2B7B720647', 'CE883C21A162', '8A6876C9463C', 'CD7025240855', '638EC548D1D0', 'ED6ED63DFB7E', 'DD89B3CFF73A', '08E66A9C3C2E', '37D23C0E26E4', '228E62AB6724', '791303DDDFFC', '2250295BD601', '4B6601E934C0', 'FE1327076AD5', '92EC8745E10C', 'B84DCC46ACCB', '4F78A27103AE', '47C857DE8CA6', 'C0DC8E915971', 'AFFF87CFD953', '6FD1F5F09540', 'C2A4F6BAD915', '6D958E82834B', '9903A8A3AB72', 'C842CB80D96C', '15B98FD13CD0', '2FB9B32B90B6', '63D15F31E734', '633D6BAA29A6', '8B2616D587F1', '9D34B3637E6D', 'E5E68106B125', 'C2CA52BD2AE1', 'B6213E12B949', '0E9980F03930', '8D76202FC24E', '7457104E001B', 'E9A0BFABECB7', 'C5DC9E806A28', '34C04B1DDB42', 'B5187069E953', 'C6CBCCE5BDFF', '85031D5C7BF5', '2611BFFBEAC1', '3044D87482E2', 'BEFCEF6878F1', '77BFE537393C', 'BD41116CF022', '0DBEE990DDE6', '8A8EA0B69A0E', 'A6D493BFFB8F', 'F39FD4C8C11A', '47DAF91A229B', '2D09B1C645A1', 'A4C5E9D054BA', '680D4367E8C2', 'E534C304A06E', '5E728AFEC0DE', 'B150AEC3A584', '87AEC33BC39D', 'A34B2B01335B', '5A3D0B7E7393', '7C4B5C765041', 'C7F38CFA9E51', '04A7803B4275', '470061CB1637', 'F9F9D052818F', '1A9259352896', 'D690A6A166D1', '3448C9C72A93', 'A085E08C910D', '585E14E0BE5A', '66567A549EC5', '5555C0F93D81', 'F705E12FEC20', 'E1C92D49D44B', '46780DDCD2C0', '449E0707E7C4', 'F4CBBA5D2AE4', 'A6CB8772BDF8', '8CED380C4617', '78DB37253EF8', '98506C7B59F5', 'ECD07317662A', '0253F3206049', 'D86D316A6DFF', 'B607BD886EA0', 'BAAFA9100F93', 'B8420BDE7F22', '1E245A3848DB', '8F9B7753A9BE', 'AB47AB850DA2', 'D5F82399AB9A', '2A1581F63AD9', 'C4C608A3C418', '4AD2CA19FF8D', '9AAE762E6F82', '6B4B25926F55', 'DA2B6F9AAD86', '06B4F16A57A0', 'F211A6708F55', 'D827B573F80E', 'B23B7FC00732', '664B3CED05FC', '17970D829F16', 'D1C1E60A93BB', '80D01289A1A0', '567CB561776A', 'D205A472D12E', '592C8A600246', '1CE77F5F57B6', 'D755B6B75874', '2FC6864DCDE3', '54944C8E298A', '53E77C5742A6', '72C317DC08E6', '0CE10207F5A6', '157BB4CA09CC', 'A97C7D4D4AA6', '736018FC709C', 'B9DFFE235CE9', 'CBA4D63498EA', '075EEA7E0293', '93C948C02C7F', '6C73D080F350', 'D61C76D574F2', '9BF43F572E97', '65F91BB2B913', '35265CCE50B7', '7457CF60D727', 'A8C158D918D0', '52EB354340B2', 'CD260CE3CBEC', '460E15CB59C4', '5C09BD81143D', '988968EA8204', '446BB153F718', '18215A91CFDF', '7737E7405383', '792CF0BFE89D', 'B53C3B7C6708', '584834109555', 'E1856D8BB7A9', '4043E54657CF', '8FCC0D12C5A1', '48CECEF2B269', 'AB06EAC9F249', 'FA9A5FF14902', '53366F9BABB6', '02926B1BFE5B', 'FA8BFC000843', '1D4005D6E588', '05A70CD3D146', 'E31C312EE731', 'E8764BAD7DFE', '5AA9774F61E5', '8B8534AB2E7E', '5DE12DDD5D4F', '90D50645EC73', '06DE6E1DF993', '40F5C81B078C', '9B0ACF5E93B8', 'C3A83432B297', '30CF1668EC28', '42373036593B', '266E3976CF33', 'CC3080234244', '011C673AA68B', 'E87F276770B6', '106D6A63056B', '1C908B6C0B9E', '3313DBC99CB1', 'A1C78980669A', 'EB964EDD87CE', '8E2429EAF807', '725252C4C7F5', '4CC8100C637F', '37C695B42323', 'CE37D27747A3', '62D2193A866D', 'BB16DDAB5B95', 'B7E2BD4B0759', 'F8D065B00F79', '6D852BDC3EAF', '411D5FAA182C', '91C9B410CF04', 'F7A30D762F64', 'BD44902CDE1B', '39DF6BADD6BE', 'ABB3B5A085C5', 'B921617152FF', '0576B055825F', '5A37D456A726', 'B78395E243FE', '188706EDDC0C', '8086E9F5FC6B', 'D6F7DC7E6CF4', '253A8831B38F', '2709B85CBE9F', '25A623D47914', '01D28BE285DB', 'EB9DE4B87EC6', '31D2E060BFA6', '322F41DABA72', '7D7F0A7DFBBE', '2C8677C91BB6', 'FF48F12D89BA', '054CAAEF9F56', '147F522AD445', '0523F3E0430F', '9790285F2C5E', '006CE38C67C4', '2AFA08938417', 'FC24137BFB37', 'DABD30340D01', 'C84F1BA53CE6', 'BE16576A3627', 'DCCFAB39C5C0', '00FD1256E1CB', '950E38AFC426', '6E38452D66A9', 'A9A31CD84389', 'D27F85FEE967', '179F0B3C62A0', 'C2844D562ABD', '5B932E33B8A8', '09594110C0AF', 'C00F31696791', 'FE4B7B72DA78', 'A6835D95F786', 'B5DD529C73BE', '38072ECCCA45', '9DBE2D915786', '2613D18E23B0', '8EFFE6DEAB21', 'FE65C6D8B74D', 'E69792BC9381', '685C181CED82', 'A40EBCE7F216', '44C217E25A08', 'B714BBC457E2', 'DC0BABC148DE', '805F93EDD6F6', '9271F7B32CFB', '64FA250075A0', 'B7B3B91B3193', '77FDE5016495', '7584C259017E', '418F44AFAE18', '8EF6250EDA92', '6D372BCEB016', '283E3A197064', '5A5107057BD8', 'E1FB5B07A30F', '9DBA107EDC1A', '1877FA4FF6E2', 'CADBD8D293AD', 'AA8DCB1E6E26', 'FD37D18D036B', '71FC4651AF13', 'C911C1DF9FE8', '508AE1F9A8DF', '0B7B2161CE27', '12D8BE593446', '22F715ABE22E', 'C204E3276BFB', '217021C120CB', '3EB2FAD1CCE6', '0C183CEE6B9F', '4A47C0A210CA', 'AD92C88FD6CD', '2B9A9AA45FA9', '32884D88897D', 'CD8152C9B205', '8F0C923F213B', 'DD74249AEFDD', '059350990E16', '2BF0DCFF7CD3', '03F940662AA8', 'D8EA38A6F4D8', 'B294915ACDEA', '9E67CFE42277', '9812318629EE', '60588AEA875A', '6B5A90B7D9B1', '4F3B5ADF90B7', '473F362782D7', '54356B4E9183', '808C122B4E3A', 'E0C1F5D60BC0', '59CFDC8CCCC8', '195829A0635A', 'A36F29B26558', '047C933D8F7F', 'BA6DCE3C997E', 'F05863DF4867', '13D094389082', '8077EA2FA698', '5E742B7DCE0E', '89A52E72AC4C', '99DF6B16B901', '1DFD43839C9E', '5C4E5535FEA6', '7ECD1E1A03A7', '3F6B5AA54AC3', '0C3C5BFDAFC6', '2B7EEDF20DEE', '6B3B1AF44FF9', '9EF5110C7202', 'DA3E86FB1AD4', 'FA39C2BF2735', '86434072F675', 'A9A7362096E4', 'EBBA532A39C1', 'F661E577C917', '45D3EE6827E8', 'C2126595816E', 'CA7FAD8F9A72', '127E1330EB1F', '461F963561C6', 'A4CF966921AF', 'E469667BE8E6', '48EA9F7F1B30', '62BD00134FD8', 'E85FEC2A7BE1', 'C2B6412C5A30', 'D9A1C121263D', '70BFEE1BF5E1', 'DEF79D41EA67', 'D4E517E99065', 'F5805360CFA7', 'E8D56AE2239A', '5A748E9DF299', 'ACD8C662D52E', '3C505A3D9C69', '5CD9729AA00A', '557C4D3DF8D4', '321B0B523784', '31679379085E', 'D3F64A8A529B', '6AC46BE958AD', '8DBA4566289F', '1AA4355F699F', '07498E0CD801', '93EFE3B0A9B4', '4087F24B0CEB', '9B0270701C04', '689EB66D52C0', '53EDAD6E7504', '1F3023419698', 'D4E4505B9564', 'FEFFA91EFEA4', 'EB968743D616', '39120DC11373', '042F49AB28B7', 'A5826EB27279', 'FD0DB4205201', '499FFCAE2335', 'EFB0C52522E0', '743F05109E5A', '78CD13AED84A', 'B69CAE55BE90', '0F33164CADB8', '5F80E3EF0067', '729BFEB846BA', 'FBB588ED54E0', 'E09BE4E8A7C7', 'D6545391E6C4', '99105535502A', '55F3499C897C', 'CC9BBBB99535', '62F1846FCA23', '3B0BECEB9BEE', 'F9E08D8FA8BD', 'BB97083C0CE6', 'F34E812D37AE', '9F67611C9C10', '07AF9D858A54', 'B8CFC59331B0', 'AF275CE42081', '05B15988C80F', 'BFA4CBEB1D36', 'DDA81249EE62', '5CAA931E428F', 'D21A04307355', '9395B8410AD9', 'C35B64D3CE66', '407DD8FC8EA2', '110CCDFDFE76', 'A0D12EFBB1F2', '8374B9C0463C', 'ABD019BE9D09', 'EF34BB213EE8', 'CE45C976BE6A', '1503E18C0212', '09553897172E', 'F3C2CEF8AC33', '9F560FA23C71', '1626F5B12CC2', '537666F7FBCF', 'D6FF9DDE4FE8', 'B220F735CC01', '8C63C2CA5E9E', '1722E742D7A0', 'FF3CB5409659', '525EA5FD2390', 'B27A7D29BFC1', 'A812E26A10C8', 'F301EC2DAB29', '1EDF242336E8', '376DA67A1CA0', 'D3EF120ADA01', 'D9D7AFC8D15F', 'BF0AEC642FFD', '959BF84B2CAF', 'FD0D098922AA', 'C71679E2554A', '42032272C21C', 'BC9F26A980EE', '851263689969', '4CD3CE220C96', '23A530BA988B', 'DBDA3013585A', '268BC2F64B00', 'CB9DDC42C52E', '63CBF7B5FACE', 'ED308C9D13FF', '7FA085F7C73B', '9C63C932D8E4', 'EE767DF81372', '4F95628D3C00', 'B8C4B85B5ED4', 'C82AD836CAF7', '6F70A49D1101', 'E26817527709', '6FA797DA8FA4', '9A9A809DEE0F', '38B4ABF39DFE', '5A7C80245AAE', '43B6189856A5', '221D405805F1', '222DD033367C', '48238939F032', 'C98770793AE3', 'C8C3484B9576', '80F75639441A', 'D1850A71C77E', '67DCF97796CE', 'EC9DBD72A99B', 'B6456B70ADEF', '3C4D951E7909', '284C7FC3E6FD', '450F7BDBC2C6', '23371D4656F3', '6AAA54C766A6', 'FD8B3A2BD914', '5FEFFB53ADFB', '5CFC720D771A', 'D69E9EF3609F', 'C068A57572FA', '153907C851A3', '66E9986FA141', '7437036A6766', 'CF867F4A2313', '7A122E815DD1', 'BE4BF12BEAB5', '4F7665EC57E8', 'AE84340EC063', 'D86FE6548CCB', '2734F7B5DE36', '30FC7C625C95', '2415C6D35B25', 'B6B903513D40', 'C318C177166B', 'E479E742E974', '4DA020943524', 'BF75A72918CF', '975B766B37B1', '146DD119FF6E', '0A0B726B4375', 'FAD10958EC69', '41ACE53D62F7', '9143360661CD', '62306D1AAE1F', '421605BC4151', 'A99A7EC15EC5', 'B147D476C3BA', 'BE834DDB8EA2', '4DBC814F7FD2', 'AE8901444312', '546C961AAC08', 'BA304EF5AB09', '9D9F3BD587D5', '47F3F27C74F1', '9433CAAE7993', 'C438C7B785A5', '87FE1A8EA9AA', '1777DF66BDB1', 'FA00E3332393', 'E9DE05415595', '52127B70E78C', '46F5C85A5650', 'D25572694D29', '6AA331C012A3', 'F0151D2642C6', '3ADFB918D1F0', 'A27FC2AB099E', '20F2672133DB', '2E500C8D2DD4', '7533075A147A', 'CAC9DED1B692', '82F9C445D3D3', '0EFF15A989E8', '45825C3C3CC4', 'D17AB3DB7DAD', 'BAB7BC9B9C1F', '9C4B92FC9EFE', '8DE459137E5E', '3F782E07EA4D', 'FE492A1D8694', '11D145793768', 'E5F118FA15C2', 'AE27945C3F7B', '5BB5FA6DBC89', 'A36F133B3EFD', '39BF0BE993B8', '43588EEC2E3C', '427C34BB72A8', '8B5F66409C7E', '985B98903B37', '6761959A94DB', '238B6AF41381', 'EE387699EC09', 'C08A4F03C757', 'B7FA221DF64C', '4C37A285AA69', '8DA0291DA9BA', '1C310A9A6E6C', '26FD05B1198B', 'B84A7BB9DAAF', '2384D3C30931', 'D66B490265AA', 'B0FAF00EF5BA', '8A7D830AD547', 'C0CE1D77134C', '4AEEB2B22D06', '68976C538F4B', 'ACCD75EA7463', '718CC29A5E8A', '390FBBD0520E', 'A4BC25E55999', '47F4977E84DF', 'F89183BA2108', '34AD217F19A6', 'A07D206188AF', '0643B76071A5', 'B539BC168351', '80B3ADF97FE6', '511DED3BC3E6', 'E0B6CC72869A', 'B1E8190F58B4', 'A290E892F5A1', 'BB619388D28E', '6C5606426D6D', '595C71CCFF5D', '76E7095D32EF', '99D72ABABDFE', 'F97072E05F17', 'EDDA54B259AB', '593E7D1DF63F', '07D92E795F03', '499CF0F71A74', 'C194641B65A2', '52A789C92ACE', 'AEA8E38CE3DE', '03A2897692E1', '1FC3711743C8', 'AF679D4A1955', '76119D7BFB1C', 'C76BD3A051B1', '8339AABBFC6D', '0973AB06D8BB', '7B51362CFE9F', '007083F03A23', 'FD009DAF40A2', '3E9A187D3416', 'D1BB4C90C529', '5230CE310F35', '260BDA96E5B0', '6290F7B68E8E', 'F644042F81FA', '77B325F4B485', '879FD71FCC8D', '6AF7403BE966', 'E6FD60A2805C', '850077C4D224', 'D03CA912549F', '7C75DF4C2D60', '5318A616A02C', '398179F08D89', '571FCEF00453', '0C97A0CCA5DB', 'D145290373B1', '2806D0F23614', '23A18CEAE5BF', 'FB394F92AE60', 'A5899B7DF995', 'A8399EBF8F89', '594F109D866F', '6AF386F5E85E', 'B1419392181E', '0CFCC8B6C230', '1F0F1AE0EC6F', '4765F425F6E0', '1BBBB3D8EB1B', 'FC773E19ACF4', '5D70A5131407', '843A2D7F7EA5', '15B71DB1E583', 'A82E2A7617A3', 'C2BA94051649', '427438CC97FF', 'BA5C58553D97', 'AA51FF37EFD2', '96118EFCB553', 'A7B7AC790FDF', 'AFDC353A5302', '3C5BD947E81E', 'E8E7FCA63703', '14968FC1BE49', '10951CB85C11', '2E3F23D5E680', 'A453C6DA1BDB', 'ED8E07AB35C5', '316F4F14F8A7', '6577587FFA46', '9FF2A8D4577B', 'A296887F5E48', 'EC80C22F4551', '8B0876EF8090', 'C732A87F48CA', '8F8D841E1675', 'D3FAD9E7AD54', '93FD2472299E', 'FD1E9D894FF0', 'DD3342062092', '9B8DA7E59E07', 'A26D70B8CEFB', '7894E5554926', '34D6DA12FFCB', 'E188603C9077', '543B2C20778E', '8A5351A59172', 'BEBB84726B5C', '79A61B3104F4', 'E234D686BF8D', '8C0FCC94BFCC', '5EE6AC7C2EDC', '41C29B7A7757', 'A8E39EA802AC', '63FCBA369ED8', '4C0B42E062D3', '64FF230513B6', '2F1DE1F0E484', '98E11B8FC140', '68F5C56F3437', '9B702EBD33DC', 'AF24BCA24061', '9C3E75E88983', '88CB37137EB6', 'ACDD8A51B625', 'A8AF66110F8B', 'F9082358FF90', '40948955D7C0', 'B998AD7B3A77', '8C52229374DA', '0B274633E099', 'D5FD485AAF67', '87C523429BA0', 'A039D524688D', 'EB187EE1BFE3', 'A7B7E3A87E11', 'C7CA1846AE15', 'CA0C14812793', '03168239F627', 'BC35DA16A11E', '9F33DE4AA68C', '4E8FB5CDCED9', '8728DF7A2465', 'AB88BAD315C4', '51C7C070A583', 'B43AC0D6A4FD', 'DF5C0FFEBFEF', '073355FB4D7C', '27EAAD2EC5CE', 'E0C2BA07DB6C', '7B9FEEEB7AA6', '2D1D50C19A54', '1909EB78394E', '124E9CD94AFA', 'A716C0185828', '69088F66B221', 'B2DF78FD592F', '5559BC8A659C', '39BA3BD7B0F5', 'DD3669CF4F8E', 'B3EEDBE635BD', '01772FF98B5E', '75291223EECC', 'A921DE922B6C']
        ),
        array( // row #2
            'name'         => 'CS10',
            'description'  => 'appeasement',
            'display_name' => 'CS10',
            'scope'        => 'local',
            'action'       => 'ActionPercent',
            'amount'       => 10,
            'is_active'    => 1,
            'split'        => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,

            'code_pool'    => ['CS10047'],
            'code_until'   => '2013-07-18 00:00:00'
        ),
        array( // row #3
            'name'         => 'CS15',
            'description'  => 'appeasement',
            'display_name' => 'CS15',
            'scope'        => 'local',
            'action'       => 'ActionPercent',
            'amount'       => 15,
            'is_active'    => 1,
            'split'        => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,

            'code_pool'    => ['cs15005', 'cs15006', 'cs15011'],
            'code_until'   => '2013-06-30 00:00:00'
        ),
        array( // row #4
            'name'              => 'RC10',
            'description'       => 'refund/cancelation',
            'display_name'      => 'RC10',
            'scope'             => 'local',
            'action'            => 'ActionPercent',
            'amount'            => 10,
            'is_active'         => 1,
            'split'             => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,

            'code_pool'         => ['rc10066', 'rc10074', 'rc10075', 'rc10076', 'rc10077', 'rc10078', 'rc10079 ', 'rc10080', 'rc10082', 'rc10083 ', 'rc10084 ', 'rc10085', 'rc10086', 'rc10087', 'rc10088', 'rc10072', 'rc10089', 'rc10090', 'rc10092', 'rc10091'],
            'once_per_customer' => 1,
            'code_until'        => '2013-07-08 00:00:00'
        ),
        array( // row #6
            'name'         => 'ProjectA30',
            'description'  => 'Project A Employee Discount',
            'display_name' => 'ProjectA30',
            'scope'        => 'local',
            'action'       => 'ActionPercent',
            'amount'       => 30,
            'is_active'    => 1,
            'split'        => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,
            'reusalbe'     => 1,

            'code_pool'    => ['ProjectA30'],
            'code_until'   => '2013-06-30 00:00:00'
        ),
        array( // row #7
            'name'         => 'ProjectA25',
            'description'  => 'ProjectA25',
            'display_name' => 'ProjectA25',
            'scope'        => 'local',
            'action'       => 'ActionPercent',
            'amount'       => 25,
            'is_active'    => 1,
            'split'        => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,
            'reusalbe'     => 1,

            'code_pool'    => ['ProjectA25'],
            'code_until'   => '2013-06-30 00:00:00'
        ),
        array( // row #9
            'name'              => 'ROC15',
            'description'       => '15% off',
            'display_name'      => 'ROC15',
            'scope'             => 'local',
            'action'            => 'ActionPercent',
            'amount'            => 15,
            'is_active'         => 1,
            'split'             => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,

            'code_pool'         => ['ROC15'],
            'once_per_customer' => 1,
            'code_until'        => '2013-08-31 00:00:00'
        ),
        array( // row #10
            'name'              => 'SO Offline Sale',
            'description'       => '15% off',
            'display_name'      => 'SO Offline Sale',
            'scope'             => 'local',
            'action'            => 'ActionPercent',
            'amount'            => 15,
            'is_active'         => 1,
            'split'             => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,
            'code_pool'         => ['15off'],
            'once_per_customer' => 1,
            'code_until'        => '2013-12-31 00:00:00'
        ),
        array( // row #14
            'name'         => 'Saatchi Online Team',
            'description'  => 'Saatchi Online Team',
            'display_name' => 'Saatchi Online Team',
            'scope'        => 'local',
            'action'       => 'ActionPercent',
            'amount'       => 30,
            'is_active'    => 1,
            'split'        => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NORMAL,
            'code_pool'    => ['SaatchiSantaMonica30'],
            'code_until'   => '2013-08-31 00:00:00'
        ),
        array( // row #15
            'name'              => 'SOHO Print',
            'description'       => 'SOHO25',
            'display_name'      => 'SOHO Print',
            'scope'             => 'local',
            'action'            => 'ActionPercent',
            'amount'            => 25,
            'is_active'         => 1,
            'split'             => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,

            'code_pool'         => ['SOHO25'],
            'once_per_customer' => 1,
            'code_until'        => '2013-09-01 00:00:00'
        ),
        array( // row #16
            'name'              => 'SOHO Original 10%',
            'description'       => '10% off Original',
            'display_name'      => 'SOHO Original 10%',
            'scope'             => 'local',
            'action'            => 'ActionPercent',
            'amount'            => 10,
            'is_active'         => 1,
            'split'             => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,

            'code_pool'         => ['ORIGINALSOHO10'],
            'once_per_customer' => 1,
            'code_until'        => '2013-09-01 00:00:00'
        ),
        array( // row #17
            'name'              => 'SOHO Original 15%',
            'description'       => '15% off original',
            'display_name'      => 'SOHO Original 15%',
            'scope'             => 'local',
            'action'            => 'ActionPercent',
            'amount'            => 15,
            'is_active'         => 1,
            'split'             => Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION_ARTIST_NONE,
            'code_pool'         => ['ORIGINALSOHO15'],
            'once_per_customer' => 1,
            'code_until'        => '2013-09-01 00:00:00'
        ),
    );

    /**
     * @return string $message for GUI
     */
    public function install()
    {
        $this->installPacSalesrule();
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return true;
    }

    /**
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory(ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    protected function installPacSalesrule()
    {
        foreach ($this->promotions as $promotion) {
            $pacSalesrule = ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery::create();
            $pacSalesrule->filterByDisplayName($promotion['display_name']);

            $newPacSalesrule = $pacSalesrule->findOne();
            if (!$newPacSalesrule) {
                $newPacSalesrule = Generated_Zed_EntityLoader::getPacSalesrule();
                $newPacSalesrule->setName($promotion['name']);
                $newPacSalesrule->setDescription($promotion['description']);
                $newPacSalesrule->setDisplayName($promotion['display_name']);
                $newPacSalesrule->setScope($promotion['scope']);
                $newPacSalesrule->setAction($promotion['action']);
                $newPacSalesrule->setAmount($promotion['amount']);
                $newPacSalesrule->setIsActive($promotion['is_active']);

                // add split in sao
                $saoSalesRule = Generated_Zed_EntityLoader::getSaoSalesrule();
                $saoSalesRule->setCostDistribution($promotion['split']);

                $newPacSalesrule->setSaoSalesrule($saoSalesRule);

                if (isset($promotion['code_pool'])) {

                    $pacSalesruleCodepool = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery::create()
                        ->filterByName($promotion['name'])
                        ->findOneOrCreate();

                    if (isset($promotion['reusable'])) {
                        $pacSalesruleCodepool->setIsReusable(1);
                    }

                    if (isset($promotion['once_per_customer'])) {
                        $pacSalesruleCodepool->setIsOncePerCustomer(1);
                    }

                    $pacSalesruleCodepool->setIsRefundable(1);
                    $pacSalesruleCodepool->setIsActive(1);
                    $pacSalesruleCodepool->save();

                    foreach ($promotion['code_pool'] as $code) {
                        $newCode = ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery::create()
                            ->filterByCode($code)
                            ->filterByCodepool($pacSalesruleCodepool)
                            ->findOneOrCreate();
                        $newCode->setIsActive(1);
                        $newCode->save();
                    }

                    $codePoolId = $pacSalesruleCodepool->getIdSalesruleCodepool();

                    $pacSalesruleCondition = Generated_Zed_EntityLoader::getPacSalesruleCondition();
                    $pacSalesruleCondition->setCondition('ConditionVoucherCodeInPool');
                    $pacSalesruleCondition->setConfiguration('{"number":"' . $codePoolId . '"}');
                    $newPacSalesrule->addSalesruleCondition($pacSalesruleCondition);
                }

                if (isset($promotion['code_until'])) {
                    $pacSalesruleCondition2 = Generated_Zed_EntityLoader::getPacSalesruleCondition();
                    $pacSalesruleCondition2->setCondition('ConditionDateBetween');
                    $pacSalesruleCondition2->setConfiguration('{"start_date":"2013-01-01 00:00:00","end_date":"' . $promotion['code_until'] . '"}');
                    $newPacSalesrule->addSalesruleCondition($pacSalesruleCondition2);
                }

                $newPacSalesrule->save();
            }
        }
    }

}
