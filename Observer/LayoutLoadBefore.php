<?php
namespace NGP\Core\Observer;
use Magento\Framework\Event\Observer as O;
use Magento\Framework\Event\ObserverInterface;
# 2026-05-07
# 1) "Replace `INDEX` with `NOINDEX` in the `<meta name='robots' content='INDEX,FOLLOW'/>` tag
# on layered navigation pages": https://github.com/national-glass-partitions/core/issues/1
# 2) "Replace `INDEX` with `NOINDEX` in the `<meta name='robots' content='INDEX,FOLLOW'/>` tag
# on `catalogsearch/result` pages": https://github.com/national-glass-partitions/core/issues/2
final class LayoutLoadBefore implements ObserverInterface {
	/**
	 * 2026-05-07
	 * @override
	 * @see ObserverInterface::execute()
	 * @see \Magento\Framework\View\Layout\Builder::loadLayoutUpdates():
	 * 		$this->eventManager->dispatch(
	 * 			'layout_load_before',
	 * 			['full_action_name' => $this->request->getFullActionName(), 'layout' => $this->layout]
	 * 		);
	 * https://github.com/magento/magento2/blob/2.4.4/lib/internal/Magento/Framework/View/Layout/Builder.php#L79-L82
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 */
	function execute(O $o):void {
		df_handles();
	}
}