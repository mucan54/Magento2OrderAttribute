# Mage2 Module Mucan OrderDetails

    ``mucan/module-orderdetails``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Order details

## Installation
\* = in production please use the `--keep-generated` option

### Zip file

 - Unzip the zip file in `app/code`
 - Enable the module by running `php bin/magento module:enable Mucan_OrderDetails`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`
 
## Specifications

 - Model
    - OrderDetails
 
A new order detials object will be generated for every order automatically


## Attributes
 Address Attribute "Nearest Landmark" will appear on checkout for both billing and shippping addresses


