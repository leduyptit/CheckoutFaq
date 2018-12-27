<?php
 
namespace Convert\CheckoutFaq\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

class ConfigProvider implements ConfigProviderInterface
{
    /** @var LayoutInterface  */
    protected $_layout;
    protected $blocks;

    public function __construct(LayoutInterface $layout, $blockIds, \Magento\Cms\Model\BlockRepository $staticBlockRepository)
    {
        $this->_layout = $layout;
        $this->blocks = $this->buildBlocks($blockIds);
        $this->staticBlockRepository = $staticBlockRepository;
    }

    public function buildBlocks($blockIds) {
        $blocks = array();
        foreach ($blockIds as $blockName => $blockId) {
            $blocks[$blockName] = $this->constructBlock($blockId);
            $blocks['t_'.$blockName] = $this->getTileBlock($blockId);
        }
        return $blocks;
    }

    public function constructBlock($blockId){
        $block = $this->_layout->createBlock('Magento\Cms\Block\Block')
                 ->setBlockId($blockId)->toHtml();
        return $block;
    }

    public function getTileBlock($blockId){
        $myCmsBlock = $this->_layout->createBlock('Convert\CheckoutFaq\Block\Cms\Block')->setBlockId($blockId);
        $blockTitle = $myCmsBlock->getTitle();
        return $blockTitle;
    }

    public function getConfig()
    {
        return $this->blocks;
    }
}