import $ from 'jquery';
window.$ = $;

import keys from 'object-keys';
Object.keys = Object.keys || keys;



// common functionality
import './modules/common/bodyScrolling';
import './modules/common/formBackup';
import './modules/common/messages';
import './modules/common/lazyImages';

// forms related
import './modules/forms/dropdown';
import './modules/forms/radio';
import './modules/forms/checkbox';
import './modules/forms/stepper';
import './modules/forms/passwordInput';
import './modules/forms/input';

// navigation related
import './modules/navigation/headerMenu';
import './modules/navigation/navbar';
import './modules/navigation/offcanvas';
import './modules/navigation/scrollButton';

// footer related
import './modules/content/footer/newsletter';

// catalog related
//import './modules/content/catalog/categoryHeader';

// checkout/cart/user related
import './modules/content/checkout/cartLayer';
import './modules/content/checkout/checkout';
import './modules/content/checkout/loginSlider';

// faq related
import './modules/content/faq/faqCard';
import './modules/content/faq/faqSwitch';

// product related
import './modules/content/product/productConfigurator';
import './modules/content/product/productFilter';
import './modules/content/product/productGallery';
import './modules/content/product/productAccordion';
import './modules/content/product/productOptions';
// import './modules/productSlider'; (currently not in use)

// temporarily included
import './modules/zed/formBuilder';
