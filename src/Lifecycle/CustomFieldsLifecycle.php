<?php declare(strict_types=1);

namespace FrontendDevIntermediateCampaignStylingTheme\Lifecycle;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\System\CustomField\CustomFieldTypes;

class CustomFieldsLifecycle
{
    private const string CUSTOM_FIELD_SET_NAME = 'Academy Custom Field Set';
    private const string CUSTOM_FIELD_NAME = 'academy_product_black_friday';

    public function __construct(
        private readonly EntityRepository $customFieldSetRepository
    ) {
    }

    public function install(Context $context): void
    {
        $this->customFieldSetRepository->upsert([
            [
                'id' => Uuid::fromStringToHex(self::CUSTOM_FIELD_SET_NAME),
                'name' => 'Academy_Product',
                'position' => 0,
                'config' => [
                    'label' => [
                        'en-GB' => self::CUSTOM_FIELD_SET_NAME,
                        'de-DE' => self::CUSTOM_FIELD_SET_NAME,
                    ],
                ],
                'relations' => [
                    [
                        'id' => Uuid::fromStringToHex(self::CUSTOM_FIELD_SET_NAME . '_product_relation'),
                        'entityName' => ProductDefinition::ENTITY_NAME,
                    ],
                ],
                'customFields' => [
                    [
                        'id' => Uuid::fromStringToHex(self::CUSTOM_FIELD_NAME),
                        'name' => self::CUSTOM_FIELD_NAME,
                        'type' => CustomFieldTypes::BOOL,
                        'config' => [
                            'componentName' => 'mt-switch',
                            'type' => 'checkbox',
                            'label' => [
                                Defaults::LANGUAGE_SYSTEM => 'Black Friday Product',
                                'en-GB' => 'Black Friday Product',
                                'de-DE' => 'Black Friday Product',
                            ],
                        ]
                    ],
                ],
            ],
        ], $context);
    }

    public function uninstall(Context $context): void
    {
        $this->customFieldSetRepository->delete([
            [
                'id' => Uuid::fromStringToHex(self::CUSTOM_FIELD_SET_NAME)
            ]
        ], $context);
    }
}