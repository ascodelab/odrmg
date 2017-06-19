# [ Order Management APIs ]
## Technology User
* Lumen Laravel comonet 5.5
## User Guide


1.search for a user
	
	url: /apis/user/{user_id}
	type:get
	param:required[user_id]
	response: JSON Object

	[
	  {
	    "id": 1,
	    "first_name": "ANIL",
	    "last_name": "SHARMA",
	    "email_id": "anela.kumar@gmail.com",
	    "created_at": "2017-06-19 01:07:40",
	    "updated_at": null
	  }
	]

2.Get all orders which were created today
	
	url: /apis/orders
	type:get
	response: JSON Object

	[
	  {
	    "id": 14,
	    "email_id": "anela.kumar@gmail.com",
	    "status": "created",
	    "created_at": "2017-06-19 01:36:00",
	    "updated_at": null
	  }
	]


3. get order by id


	url: /apis/orders/id
  
	type:get
  
	param:required[id]
  
	response: JSON Object
  
	
  {
	  "0": {
	    "id": 14,
	    "email_id": "anela.kumar@gmail.com",
	    "status": "processed",
	    "created_at": "2017-06-19 01:36:00",
	    "updated_at": "2017-06-19 04:53:12"
	  },
	  "items": [
                {
                  "id": 5,
                  "order_id": 14,
                  "name": "",
                  "price": 0,
                  "quantity": 0,
                  "created_at": "2017-06-19 03:37:47",
                  "updated_at": null
                },
                {
                  "id": 6,
                  "order_id": 14,
                  "name": "",
                  "price": 0,
                  "quantity": 0,
                  "created_at": "2017-06-19 03:44:30",
                  "updated_at": null
                }
              ]
	    }



4. Add new order to the system


	url: /apis/orders
  
	type:post
  
	param:required[email_id]
  
	input:JSON Object
  
		ex. {"email_id":"anela.kumar@gmail.com"}
    
	response: JSON Object
  
		ex. {"email_id":"anela.kumar@gmail.com","id":16}

5. Add items to the order


	url: /apis/orders/items/add
  
	type:post
  
	param:required[order_id] && [name,quantity,price]
  
	input:JSON Object
  
		ex. {	
				"order_id":4,
				"items":
					[
						{"name":"item1","price":10.4,"quantity":4},
						{"name":"item3","price":102.4,"quantity":42}
					]
			}
	response: JSON Object
  
	ex. {"status":true}


6. Update order

	url: /apis/orders/update
  
	type:put
  
	param:required[order_id] && [email,status]
  
	ex. {	
			"order_id":19,
			"email":"anela.kumar@gmail.com",
			"status":"processed"		
		}
    
	respone: Bool true | false

7. Cancel order

	url: /apis/orders/cancel
  
	type:put
  
	param:required[order_id]
  
	ex. {
			"order_id":19
		}
    
	response: bool true | false
	
	
8. Add Payment

	url: /apis/orders/payment
  
	type:put
  
	param:required[order_id,amount,type]
  
	ex. {	
			"order_id":19,
			"amount":22.4,
			"type":"COD"		
		}
    
	respone: Json Object
