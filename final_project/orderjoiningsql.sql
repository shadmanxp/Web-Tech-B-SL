SELECT
orders.order_id,
all_user.user_id,
concat(all_user.first_name,' ',all_user.last_name) as full_name,
all_user.phone,
orders.order_date,
shipping_info.shipping_address,
shipping_info.billing_address,
products_in_order.product_id,
products.product_name,
category.category_name,
products.farmer_seller,
products_in_order.quantity,
products.price,
products.price * products_in_order.quantity as sub_total,
shipping_info.shipping_cost,
products.price*products_in_order.quantity+shipping_info.shipping_cost as total,
orders.order_status,
shippers.shipper_name,
shippers.contact_no
FROM orders 
INNER JOIN all_user ON orders.user_id=all_user.user_id 
INNER JOIN products_in_order ON orders.order_id=products_in_order.order_id 
INNER JOIN products ON products_in_order.product_id=products.product_id
INNER JOIN category ON products.category_id=category.category_id
INNER JOIN shipping_info ON shipping_info.order_id=orders.order_id
INNER JOIN shippers ON shipping_info.shipper_id=shippers.shipper_id;