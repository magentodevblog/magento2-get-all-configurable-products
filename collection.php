use Magento\Framework\App\Bootstrap;
require __DIR__ . '/app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);

$obj = $bootstrap->getObjectManager();

$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');

$productCollection = $obj->create('Magento\Catalog\Model\ResourceModel\Product\Collection');

foreach($productCollection as $product){
     if($product->getTypeId() == "configurable"){
          $children = $product->getTypeInstance()->getUsedProducts($product);
          if(!empty($children)){
               foreach ($children as $child){
                    var_dump($child->getSku());
               }
          }
     }
}
