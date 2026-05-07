A custom module for [nationalglasspartitions.co.uk ](https://nationalglasspartitions.co.uk) (Magento 2).  

## How to install
```bash             
(
	bin/magento maintenance:enable
	composer require ngp/core:* --ignore-platform-req=ext-ftp
	rm -rf var/di var/generation generated/*
	bin/magento setup:upgrade
	bin/magento cache:enable
	bin/magento setup:di:compile	
)
(
	bin/magento cache:clean
	(
		o=(
			pub/static/*		
			var/cache
			var/page_cache
			var/view_preprocessed
		) 
		rm -rf "${o[@]}"
	)
	(
		ll='en_US en_GB'
		tt=(
			'adminhtml Magento/backend'
			'frontend Smartwave/porto'
		)	
		for t in "${tt[@]}"; do
			read -r area theme <<< "$t"
			o=(
				--area $area
				--force
				--theme $theme
			)
			bin/magento setup:static-content:deploy "${o[@]}" $ll
		done
	)
	bin/magento cache:clean	
)	
bin/magento maintenance:disable
```

## How to upgrade
```     
(
	bin/magento maintenance:enable
	composer remove ngp/core --ignore-platform-req=ext-ftp
	composer require ngp/core:* --ignore-platform-req=ext-ftp
	rm -rf var/di var/generation generated/*
	bin/magento setup:upgrade
	bin/magento cache:enable
	bin/magento setup:di:compile	
)
(
	bin/magento cache:clean
	(
		o=(
			pub/static/*		
			var/cache
			var/page_cache
			var/view_preprocessed
		) 
		rm -rf "${o[@]}"
	)
	(
		ll='en_US en_GB'
		tt=(
			'adminhtml Magento/backend'
			'frontend Smartwave/porto'
		)	
		for t in "${tt[@]}"; do
			read -r area theme <<< "$t"
			o=(
				--area $area
				--force
				--theme $theme
			)
			bin/magento setup:static-content:deploy "${o[@]}" $ll
		done
	)
	bin/magento cache:clean	
)	
bin/magento maintenance:disable
```