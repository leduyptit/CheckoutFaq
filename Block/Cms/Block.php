<?php

namespace Convert\CheckoutFaq\Block\Cms;

class Block extends \Magento\Cms\Block\Block
{

    protected $_blockRepository;

    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Cms\Api\BlockRepositoryInterface $blockRepository,
        array $data = []
    ) {
        parent::__construct($context, $filterProvider, $storeManager, $blockFactory, $data);
        $this->_blockRepository = $blockRepository;
    }

    public function getTitle()
    {
         $blockId = $this->getBlockId();
         $title = "";
         if ($blockId) {
             $block = $this->_blockRepository->getById($blockId);
             $title = $block->getTitle();
         }
         return $title;
    }
}