<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101800717622",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEAlLGRaxo9HJmY1Bi4e+hk8BI08fOw9/SYDqz3RDE02D8fdittKEwTEKgXLQjwajirHETX10HPjS/xN359BRfrdoHG0Wf6+RCAz9ISJ2YA/2bFtO4GfBeRfmsOGruM9fIWr6G6XeWRYCre54BEEtkRPsFoBiG+dG/jwTuki3FKAaQ4hcPhVTZXEej6c1MA7QbfggXwus4dyjJpelsIJ40Y2L8P4tQIWRGmTGwXE8ctPcVUcBJ/HzU1Pk18oeFGSEkTCthq/d9pC5a2ugw8k/yMxYAR79YxXO37EGjEhUknYvOQHHvbgQZwfx5eNTBJnYZqCvwQliJLEHIZDHVKnrVGNQIDAQABAoIBAQCEb/PZtTEhPB1HLA2FL2RX/59wsWC6OP0GdUB3WGx8/xwCoINFFR0WBOE/l2qq8XZWY2rrqw417rGmf97Sno92qfhvo3GCTRSuBalttgjFcsA9epQECunn82pInSvcE5fpLt9TqpllUknfX/tB3lzhzFnevEdqZg4xmfHg0TLdag+Lyvku3sKm7hGYsIauaiEGbPrYtBtXbHibiTW0UNkzynWOahGmYWrd/63oqOiSjvOdNZE8TduViZ3w0xwQcDLOLin4bR2bVUSvVsHdFh7OCyMPiVe/QbribYJWs6/GEfyqJrvUyujE4zR3ZIhPZSM4UyPd5Tor98Uh6Ya5uSmBAoGBAMybe+JWPKAcBYLfDzmS9cCJwLaC6jp+l4fA+qKrYZBhrUCqflb/8EqqoTupcFkQaD2CB4ZFxGJ3IOn4oh+fZaH1CCkr5jHj2vo8HqulQUwZfg4PV+9yFlu8mYmauTCa/lGenFnJVU+5WW2k+hmFZifXCqIYSnDXbjTFWDk0bRjNAoGBALoKwloRw43HzQKcM8hWv21iD7d7qXz4mA6mnY/ue/6cszaqT59q57URKNnewedfB2tTrgmzHS4yCekwNxzR/V+Du0aCoc8blMqg7ZQSyByjeT9sKoMRcnrEje7ZsepsYKnRKxJgWj/7WD1NElB+7+rIC584dQjLER0yQt6h6QMJAoGBAJLs0AAO9wfuN1LsBI3OZyS0hqtIxRPuFbgJLrGjKbM5QOUfyQuGTDIB5zfli2SZcJFCj06vSL+AViVNQnY8ywmK4CpYeLu4qGVqyIdvar1PzQIhqH6sSTvk6cgzT+qEUj2gDRw4hEd0jLA8eM/cyCexttQBZ2syd9PzJlAlwnW9AoGBAK9WUJGeyFUph3f8S3l2+HdYwkNFUxmrGXRFZ54tP8NZYDYXEW/Hy5UFFSExJkKvd0iZ1x7hJpFRK7IQdQC+kDOi7a+okmOlNPg7721svhjvoOg7Q12/5cr60GHZ3ip39ipWLmflU2mVszYjGy2uVONLolhvVy3wZLLFmexFYFwxAoGBAKiNqR2ATIiv2koSXfRyz2BPBOe6/PB9tACzv2140HifgORP+36WQ8WfBjExP7r+HD0P3gw/ty379APsCayrD++FAmJkzwvxi9fe9t4yIz3rV5yJ1AMzTj1DpCs05GN3MbR/4KMHo7rz/D5GImIUWZheo6bGf2R5BIH/th+DYsmL",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAm+o7P7w/gkn97sUIqW3mcsn+EdbWCUW6MG7+YGh5LItAQEUqDtqWCC2wJpiqWy4fC/SyzwxQ/2pAFLlTFl5zY8vUfX7M/wT+4wrT8WefhJ+mYNxOTOrfXGCIcVC0qUWli0+wjrfTZ8DeRng0flUDDIRLJi6L5prG99erZZAiPwiON9ZUsQcGPjNgnlN51DaUjo8V79Zp2RaAQaASBVdHlf76JEkLxD+UeyUsnzmC3alci8F+BJWFJJ1RuT3LvW6A0kmXZ8vPfHYso+og5QKHV2IxC5GqAba6It5DEWrzHGLfoatu88UPAfm7CfJF/T+wS5oGI17Oc8GP2oLBZ3y0xwIDAQAB",
		
	
);