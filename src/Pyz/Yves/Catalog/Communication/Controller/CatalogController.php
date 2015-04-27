<?php

namespace Pyz\Yves\Catalog\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use SprykerFeature\Yves\Library\Tracking\PageTypeInterface;
use SprykerFeature\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\Request;

class CatalogController extends AbstractController
{
    /**
     * @param array $categoryNode
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(array $categoryNode, Request $request)
    {
        $search = $this->getLocator()->catalog()->sdk()->createFacetSearch($request, $categoryNode);
        $categoryTree = $this->getLocator()->categoryExporter()->sdk()->getTreeFromCategoryNode($categoryNode, $this->getLocale());

        //TODO check if this should be renamed to categoryNode
        //TODO Why does $categoryNode & $categoryTree contain exactly the same value?
        $r = array_merge($search->getResult(), ['category' => $categoryNode, 'categoryTree' => $categoryTree]);

        //@Todo Remove mocks
        $r['products'] = $this->getDummyProductData();

        if($request->isXmlHttpRequest()) {
            return $this->jsonResponse($r);
        }

        return $r;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function fulltextSearchAction(Request $request)
    {
        $search = $this->getLocator()->catalog()->sdk()->createFulltextSearch($request);

        return array_merge($search->getResult(), ['searchString' => $request->get('q')]);
    }

    /**
     * @param array $product
     *
     * @return array
     */
    public function detailAction(array $product)
    {
        return [
            'product' => $product
        ];
    }

    /**
     * @TODO Delete this once the product / category export works fine again
     * @return array
     */
    protected function getDummyProductData() {
        $products = [
            '{"sku":"137288","attributes":{"image_url":"\/images\/product\/2015_72_RGB_13728.jpg","thumbnail_url":"\/images\/product\/default.png","price":599,"width":5,"height":12,"depth":1,"main_color":"rot","other_colors":"blau, schwarz","description":"Das Bild der Pfauen pr\u00e4gen die H\u00e4hne mit ihrem pr\u00e4chtigen Federkleid. In der Balz versuchen sie damit, die eher unscheinbaren Hennen f\u00fcr sich zu gewinnen.","description_long":"Das auff\u00e4lligste Merkmal im Prachtkleid ausgewachsener H\u00e4hne ist das aus ca. 150 Federn bestehende Schwanzgefieder, das in der Balz zu einem beeindruckenden Rad geschlagen wird. Jede Schmuckfeder tr\u00e4gt an ihrem Ende einen Augenfleck. Auch die Hennen tragen eine kleine Federkrone auf dem Scheitel, sind ansonsten aber eher unscheinbar.","fun_fact":"Das Prachtkleid der Pfauen besteht aus ca. 150 Federn.","scientific_name":"Pavo cristatus"},"name":"Pfau","url":"\/Pfau","available":true,"valid_price":5.99,"prices":"{\"DEFAULT\":{\"price\":\"599\"}}","category":{"16":{"node_id":"16","name":"Wilde Tiere","url":"\/wilde-tiere"}}}',
            '{"sku":"137455","attributes":{"image_url":"\/images\/product\/2015_72_RGB_13745.jpg","thumbnail_url":"\/images\/product\/default.png","price":359,"width":5,"height":3,"depth":2,"main_color":"rot","other_colors":"blau, schwarz","description":"Mit ihrem dicken, flauschigen Fell sind Schafe an jedem Ort vor K\u00e4lte gesch\u00fctzt.","description_long":"Schafe werden seit Jahrhunderten als landwirtschaftliche Nutztiere gehalten und liefern Fleisch, Haut und Wolle. Als Pflanzenfresser und Wiederk\u00e4uer sind Schafe abwechselnd mit Grasen und Wiederk\u00e4uen besch\u00e4ftigt. Da es Hunderte von Schafrassen gibt, k\u00f6nnen sich diese S\u00e4ugetiere erheblich im Hinblick auf Fell und Gr\u00f6\u00dfe unterscheiden. Schafe wiegen zwischen 45 und 180 Kilo und k\u00f6nnen zehn bis zwanzig Jahre alt werden. Ihr eingeschr\u00e4nktes r\u00e4umliches Sehverm\u00f6gen gleichen Schafe durch ein ausgezeichnetes Geh\u00f6r und einen sehr empfindlichen Geruchssinn aus. In der Herde folgen Schafe meist den Anweisungen eines Sch\u00e4fers, sie haben aber auch ihre eigene Rangordnung.","fun_fact":"Schafe k\u00f6nnen hinter sich sehen, ohne den Kopf zu bewegen.","scientific_name":"Ovis orientalis aries"},"name":"Sch\u00e4fchen, liegend","url":"\/Sch\u00e4fchen,-liegend","available":true,"valid_price":3.59,"prices":"{\"DEFAULT\":{\"price\":\"359\"}}","category":{"15":{"node_id":"15","name":"Wald und Wiese","url":"\/wald-und-wiese"}}}',
            '{"sku":"137479","attributes":{"image_url":"\/images\/product\/2015_72_RGB_13747.jpg","thumbnail_url":"\/images\/product\/default.png","price":499,"width":7,"height":3,"depth":3,"main_color":"rot","other_colors":"blau, schwarz","description":"H\u00e4ngebauchschweine haben einen gedrungenen K\u00f6rperbau und einen weit herab h\u00e4ngenden Bauch, dem sie ihren Namen verdanken.","description_long":"Das H\u00e4ngebauchschwein wird auch als vietnamesisches H\u00e4ngebauchschwein bezeichnet, weil es aus S\u00fcdostasien stammt. H\u00e4ngebauchschweine tragen ihren Namen wegen ihres auff\u00e4lligen, gedrungenen K\u00f6rperbaus mit kurzen Beinen und tief herabh\u00e4ngendem Bauch. Mancherorts sind sie eine Attraktion in Streichelzoos oder werden sogar als Haustiere gehalten.","fun_fact":"Bei manchen H\u00e4ngebauchschweinen schleift der Bauch fast am Boden.","scientific_name":"Sus scrofa domnestica"},"name":"H\u00e4ngebauchschwein","url":"\/H\u00e4ngebauchschwein","available":true,"valid_price":4.99,"prices":"{\"DEFAULT\":{\"price\":\"499\"}}","category":{"15":{"node_id":"15","name":"Wald und Wiese","url":"\/wald-und-wiese"}}}',
            '{"sku":"137837","attributes":{"image_url":"\/images\/product\/2015_72_RGB_13783_VAR_v15_TP.jpg","thumbnail_url":"\/images\/product\/default.png","price":359,"width":5,"height":3,"depth":1,"main_color":"rot","other_colors":"blau, schwarz","description":"Ferkel kommen mit zahlreichen Geschwistern auf die Welt. In der Regel umfasst ein Wurf 10-14 Tiere.","description_long":"Schweine sind sehr soziale Tiere und k\u00fcmmern sich liebevoll um ihren Wurf. Wenn sie drau\u00dfen zur Welt kommen d\u00fcrfen, graben tr\u00e4chtige S\u00e4ue vorher eine heimelige Kuhle und betten diese mit weichen \u00c4sten, Gras und Bl\u00e4ttern aus. Darin kommen die Kleinen dann zur Welt und suchen schon wenige Minuten nach der Geburt den Weg zur Zitze, um leckere Muttermilch zu schlabbern. Beim S\u00e4ugen singt ihre Mutter ihnen sogar ein Lied vor. Zumindest klingt das in den Ohren der Ferkel so. Es besteht aus Grunzlauten in verschiedenen Tonlagen und Abst\u00e4nden. ","fun_fact":"S\u00e4ue singen ihren Ferkeln w\u00e4hrend des S\u00e4ugens ein Lied vor.","scientific_name":"Sus scrofa domestica"},"name":"Ferkel, stehend","url":"\/Ferkel,-stehend","available":true,"valid_price":3.59,"prices":"{\"DEFAULT\":{\"price\":\"359\"}}","category":{"15":{"node_id":"15","name":"Wald und Wiese","url":"\/wald-und-wiese"}}}',
            '{"sku":"143210","attributes":{"image_url":"\/images\/product\/2015_72_RGB_14321.jpg","thumbnail_url":"\/images\/product\/default.png","price":499,"width":1,"height":9,"depth":2,"main_color":"rot","other_colors":"blau, schwarz","description":"Giraffen k\u00f6nnen bis 6 Meter hoch werden. Der extrem lange Hals, die langen, d\u00fcnnen Beine und ihr geflecktes Fell verleihen ihr, ihr typisches Aussehen.","description_long":"Giraffen sind mit bis zu 6 Metern die am h\u00f6chsten aufragenden Lands\u00e4ugetiere - ihre K\u00e4lber k\u00f6nnen bei der Geburt bereits 1,80 Meter hoch sein! Jede Giraffe hat ein einzigartiges Fellmuster -- die Unterarten der Giraffe werden anhand von Farb- und Mustervariationen sowie nach der geographischen Verbreitung unterschieden. Einige Giraffen sind an rundlichen oder ungleichm\u00e4\u00dfig geformten Flecken zu erkennen -- andere an sternf\u00f6rmigen Flecken auf hellbraunem Untergrund, die sich bis zu den Hufen hinunterziehen. Trotz ihres ungew\u00f6hnlich langen Halses hat die Giraffe die gleiche Anzahl Halswirbel wie der Mensch, n\u00e4mlich sieben. Giraffen finden ihre Nahrung \u00fcberall in den W\u00e4ldern und Savannen des s\u00fcdlichen Afrika, indem sie die jungen Triebe in den Baumkronen abweiden. Wie Kamele k\u00f6nnen Giraffen zwei oder drei Tage ohne Wasser auskommen. Auf dem Kopf tragen sie mehrere fell\u00fcberzogene hornartige Knochenzapfen. Giraffen schlafen nie l\u00e4nger als eine Stunde und k\u00f6nnen einen ganzen Tag ohne Schlaf auskommen. Den gr\u00f6\u00dften Teil des Tages schlendern Giraffen gem\u00fctlich umher, k\u00f6nnen aber bei Bedarf auch Geschwindigkeiten von bis zu 55 Stundenkilometern erreichen! Manche Giraffen leben in Herden von bis zu f\u00fcnfzehn Tieren, aber die soziale Struktur \u00e4ndert sich ","fun_fact":"Giraffen brauchen ein riesiges Herz, das das Blut bis hinauf zum Kopf pumpt. Au\u00dferdem haben sie eine 50cm lange, blaugraue Greifzunge.","scientific_name":"Giraffa camelopardalis"},"name":"Giraffenbaby","url":"\/Giraffenbaby","available":true,"valid_price":4.99,"prices":"{\"DEFAULT\":{\"price\":\"499\"}}","category":{"16":{"node_id":"16","name":"Wilde Tiere","url":"\/wilde-tiere"}}}',
            '{"sku":"143647","attributes":{"image_url":"\/images\/product\/2015_72_RGB_14364.jpg","thumbnail_url":"\/images\/product\/default.png","price":359,"width":7,"height":4,"depth":2,"main_color":"rot","other_colors":"blau, schwarz","description":"L\u00f6wen sind die gr\u00f6\u00dften Raubkatzen Afrikas. Ihr Fell ist meist sandfarben und erwachsene M\u00e4nnchen haben eine dunkle M\u00e4hne.","description_long":"L\u00f6wen durchstreifen die afrikanische Savanne in Rudeln, die aus miteinander verwandten Weibchen, deren Jungen und einem einzelnen M\u00e4nnchen bestehen. Wenn ein M\u00e4nnchen das Erwachsenenalter erreicht, wird es aus dem Rudel versto\u00dfen und muss sich eine eigene Gruppe suchen. L\u00f6winnen jagen im Team. Gemeinsam k\u00f6nnen sie gro\u00dfe Beutetiere wie Zebras, B\u00fcffel, Giraffen, Flusspferde und sogar junge Elefanten \u00fcberw\u00e4ltigen, aber sie verschm\u00e4hen auch die Reste von Mahlzeiten anderer Tiere nicht. L\u00f6wen schlafen bis zu zwanzig Stunden pro Tag und sowohl M\u00e4nnchen als auch Weibchen verteidigen ihr Rudel gegen fremde Eindringlinge. Das Br\u00fcllen eines L\u00f6wen ist sehr laut und in einer Entfernung von bis zu acht Kilometern h\u00f6rbar. L\u00f6wen br\u00fcllen, um miteinander zu kommunizieren und Eindringlinge abzuschrecken. M\u00e4nnchen und Weibchen haben hellbraunes Fell. M\u00e4nnchen haben dicke, braune M\u00e4hnen, die im Laufe ihres Lebens l\u00e4nger und dunkler werden.","fun_fact":"L\u00f6wen leben im Rudel, das von einem starken M\u00e4nnchen angef\u00fchrt wird. Meist jagen die Weibchen gemeinsam  Gnus oder Antilopen.","scientific_name":"Panthera leo"},"name":"L\u00f6wenjunges","url":"\/L\u00f6wenjunges","available":true,"valid_price":3.59,"prices":"{\"DEFAULT\":{\"price\":\"359\"}}","category":{"16":{"node_id":"16","name":"Wilde Tiere","url":"\/wilde-tiere"}}}',
            '{"sku":"143654","attributes":{"image_url":"\/images\/product\/2015_72_RGB_14365.jpg","thumbnail_url":"\/images\/product\/default.png","price":599,"width":1,"height":7,"depth":1,"main_color":"rot","other_colors":"blau, schwarz","description":"Dank ihrer Flossen und des stromlinienf\u00f6rmigen K\u00f6rpers sind Seel\u00f6wen anmutige, schnelle Schwimmer.","description_long":"Seel\u00f6wen haben gro\u00dfe, unbehaarte Flossen, mithilfe derer sie ihre K\u00f6rpertemperatur regulieren k\u00f6nnen. Der restliche K\u00f6rper ist mit dichtem Fell bedeckt, einer Mischung aus dauerhaftem Unterfell und l\u00e4ngeren Deckhaaren, die j\u00e4hrlich nachwachsen. Seel\u00f6wen k\u00f6nnen bis zu 200 Meter tief (viel tiefer als andere Robben) tauchen, um nach Fischen wie Heringen, Sardellen und Tintenfischen zu jagen. Sie halten sich \u00fcberwiegend im Wasser auf, aber w\u00e4hrend der Paarungszeit herrscht an den dazu aufgesuchten Str\u00e4nden ein ziemliches Gedr\u00e4nge. Die meisten machen sich im Mai zu den Paarungsgr\u00fcnden auf, und die Jungen kommen im Juni zur Welt. Die Bullen sind polygam, das hei\u00dft, sie paaren sich mit mehreren Weibchen. Die M\u00e4nnchen sind deutlich gr\u00f6\u00dfer als die Weibchen und sehr kraftvolle Tiere.Sie sichern ihr eigenes Territorium gegen andere Bullen und verteidigen ihren Harem. Seel\u00f6wen haben eine Lebenserwartung von fast drei\u00dfig Jahren.","fun_fact":"Seel\u00f6wen werden gerne in Zoos und im Zirkus mit ihren Kunstst\u00fccken vorgef\u00fchrt.","scientific_name":"Callorhinus ursinus"},"name":"Seel\u00f6we","url":"\/Seel\u00f6we","available":true,"valid_price":5.99,"prices":"{\"DEFAULT\":{\"price\":\"599\"}}","category":{"17":{"node_id":"17","name":"Meere","url":"\/meere"}}}',
            '{"sku":"143913","attributes":{"image_url":"\/images\/product\/2015_72_RGB_14391.jpg","thumbnail_url":"\/images\/product\/default.png","price":599,"width":1,"height":9,"depth":5,"main_color":"rot","other_colors":"blau, schwarz","description":"Zebras sind eine afrikanische Wildpferdeart, die leichtan ihrem auff\u00e4lligen schwarzwei\u00dfen Streifenmuster zu erkennen ist. ","description_long":"Diese pferdeartigen Tiere mit gl\u00e4nzendem, gestreiftem Fell leben in den Savannen Ost- und S\u00fcdafrikas, wo sie den gr\u00f6\u00dften Teil des Tages damit besch\u00e4ftigt sind, Gras, Bl\u00e4tter, Rinde, Wurzeln und St\u00e4ngel zu fressen. Jedes Zebra hat ein ganz individuelles Muster. Das Steppenzebra tr\u00e4gt breite Streifen (die sich am Bauch fortsetzen) sowie d\u00fcnnere \"Schattenstreifen\" am Hinterteil. Sein ausgezeichnetes Geh\u00f6r und seine scharfen Augen helfen ihm, Raubtieren zu entkommen. Zebras leben meist in Familiengruppen, die sich aus einem Hengst und mehreren Stuten zusammensetzen, bilden aber auch oft gro\u00dfe Herden aus mehreren Hundert Zebras. Einmal im Jahr kommen Hunderttausende zu einer Wanderung auf der Suche nach Nahrung und Wasser zusammen. Manchmal vermischen sich diese Herden mit Gnus, Strau\u00dfen und Antilopen. Zebras sind im Allgemeinen recht schreckhaft (was man ihnen angesichts all der L\u00f6wen und Hy\u00e4nen in ihrer N\u00e4he nicht verdenken kann) und ziemlich laut. Sie kommunizieren durch Wiehern, Jaulen und Bellen miteinander. Sie entfernen sich nie zu weit von einer Wasserquelle und k\u00f6nnen in freier Wildbahn etwa drei\u00dfig Jahre alt werden.","fun_fact":"Zebras k\u00f6nnen nachts gut sehen, was ihnen hilft, Raubtiere im Auge zu behalten und bei Gefahr rechtzeitig zu fl\u00fcchten.","scientific_name":"Equus quagga"},"name":"Zebra Hengst","url":"\/Zebra-Hengst","available":true,"valid_price":5.99,"prices":"{\"DEFAULT\":{\"price\":\"599\"}}","category":{"16":{"node_id":"16","name":"Wilde Tiere","url":"\/wilde-tiere"}}}',
            '{"sku":"146013","attributes":{"image_url":"\/images\/product\/2015_72_RGB_14601.jpg","thumbnail_url":"\/images\/product\/default.png","price":499,"width":0,"height":0,"depth":0,"main_color":"rot","other_colors":"blau, schwarz","description":"#NV","description_long":"#NV","fun_fact":"#NV","scientific_name":"#NV"},"name":"Riesenschildkr\u00f6te","url":"\/Riesenschildkr\u00f6te","available":true,"valid_price":4.99,"prices":"{\"DEFAULT\":{\"price\":\"499\"}}","category":{"16":{"node_id":"16","name":"Wilde Tiere","url":"\/wilde-tiere"}}}',
        ];

        foreach ($products as $key => $val) {
            $products[$key] = json_decode($val, 1);
        }

        return $products;
    }
}
