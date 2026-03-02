<?php declare(strict_types=1);

namespace FrontendDevIntermediateCampaignStylingTheme;

use FrontendDevIntermediateCampaignStylingTheme\Lifecycle\CustomFieldsLifecycle;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Storefront\Framework\ThemeInterface;

class FrontendDevIntermediateCampaignStylingTheme extends Plugin implements ThemeInterface
{
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);

        $this->installCustomFields($installContext->getContext());
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);

        if ($uninstallContext->keepUserData()) {
            return;
        }

        $this->uninstallCustomFields($uninstallContext->getContext());
    }

    private function installCustomFields(Context $context): void
    {
        $customFieldsLifecycle = new CustomFieldsLifecycle(
            $this->container->get('custom_field_set.repository')
        );

        $customFieldsLifecycle->install($context);
    }

    private function uninstallCustomFields(Context $context): void
    {
        $customFieldsLifecycle = new CustomFieldsLifecycle(
            $this->container->get('custom_field_set.repository')
        );

        $customFieldsLifecycle->uninstall($context);
    }
}
