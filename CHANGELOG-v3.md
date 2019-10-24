# Running Release Notes for Craft Commerce 3.0

### Added
- Added the ability to create and edit orders from the Control Panel.
- Added the ability to send emails from the Edit Order page.
- Added “Edit Orders” and “Delete Orders” user permissions.
- Line items now have a status that can be changed on the Edit Order page.
- Line items now have a Private Note field for store managers.
- Inactive carts are now purged during garbage collection.
- Orders now have recalculation modes to determine what should be recalculated on the order.
- Added the `origin` order query param.
- `commerce/payments/pay` JSON responses now include an `orderErrors` array if there were any errors on the order.
- Added `craft\commerce\controllers\LineItemStatuses`.
- Added `craft\commerce\controllers\OrdersController::actionNewOrder()`.
- Added `craft\commerce\elements\Order::$origin`.
- Added `craft\commerce\elements\Order::$recalculationMode`.
- Added `craft\commerce\models\LineItem::$lineItemStatusId`.
- Added `craft\commerce\models\LineItem::$privateNote`.
- Added `craft\commerce\records\LineItemStatus`.
- Added `craft\commerce\records\Purchasable::$description`.
- Added `craft\commerce\services\Emails::getAllEnabledEmails()`.
- Added `craft\commerce\services\LineItemStatuses::EVENT_DEFAULT_LINE_ITEM_STATUS`.
- Added `craft\commerce\services\LineItemStatuses`.

## Changed
- The Edit Order page is now a Vue app. This is likely to break any plugins that use JavaScript to modify the DOM on that page.
- If no `donationAmount` line item option parameter is submitted when adding a donation to the cart, the donation amount will default to zero.
- Controller actions now call `craft\commerce\elements\Order::toArray()` when generating the cart array for JSON responses.
- `commerce/payments/pay` JSON responses now list payment form errors under `paymentFormErrors` rather than `paymentForm`.
- Customer records that are anonymous and orphaned are now deleted during garbage collection.

## Deprecated
- Deprecated `craft\commerce\elements\Order::getShouldRecalculateAdjustments()` and `setShouldRecalculateAdjustments()`. `craft\commerce\elements\Order::$recalculationMode` should be used instead.
- Deprecated `craft\commerce\services\Orders::cartArray()`. `craft\commerce\elements\Order::toArray()` should be used instead.

## Removed
- Removed the `craft.commerce.availableShippingMethods` Twig property.
- Removed the `craft.commerce.cart` Twig property.
- Removed the `craft.commerce.countriesList` Twig property.
- Removed the `craft.commerce.customer` Twig property.
- Removed the `craft.commerce.discountByCode` Twig property.
- Removed the `craft.commerce.primaryPaymentCurrency` Twig property.
- Removed the `craft.commerce.statesArray` Twig property.
- Removed the `commerce/cart/remove-all-line-items` action.
- Removed the `commerce/cart/remove-line-item` action.
- Removed the `commerce/cart/update-line-item` action.
- Removed `craft\commerce\base\Purchasable::getPurchasableId()`.
- Removed `craft\commerce\elements\db\OrderQuery::updatedAfter()`.
- Removed `craft\commerce\elements\db\OrderQuery::updatedBefore()`.
- Removed `craft\commerce\elements\db\SubscriptionQuery::subscribedAfter()`.
- Removed `craft\commerce\elements\db\SubscriptionQuery::subscribedBefore()`.
- Removed `craft\commerce\elements\Order::getOrderLocale()`.
- Removed `craft\commerce\elements\Order::getTotalDiscount()`.
- Removed `craft\commerce\elements\Order::getTotalShippingCost()`.
- Removed `craft\commerce\elements\Order::getTotalTax()`.
- Removed `craft\commerce\elements\Order::getTotalTaxIncluded()`.
- Removed `craft\commerce\elements\Order::updateOrderPaidTotal()`.
- Removed `craft\commerce\elements\Product::getSnapshot()`.
- Removed `craft\commerce\elements\Product::getUnlimitedStock()`.
- Removed `craft\commerce\elements\Variant::getSalesApplied()`.
- Removed `craft\commerce\models\Discount::getFreeShipping()`.
- Removed `craft\commerce\models\Discount::setFreeShipping()`.
- Removed `craft\commerce\models\LineItem::fillFromPurchasable()`.
- Removed `craft\commerce\models\Order::getDiscount()`.
- Removed `craft\commerce\models\Order::getShippingCost()`.
- Removed `craft\commerce\models\Order::getTax()`.
- Removed `craft\commerce\models\Order::getTaxIncluded()`.
- Removed `craft\commerce\models\ShippingMethod::$amount`.
- Removed `craft\commerce\services\Countries::getAllCountriesListData()`.
- Removed `craft\commerce\services\Gateways::getAllFrontEndGateways()`.
- Removed `craft\commerce\services\ShippingMethods::getOrderedAvailableShippingMethods()`.