<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Console;

use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\PriceProductCustomerGroupFacadeInterface getFacade()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\PriceProductCustomerGroupCommunicationFactory getFactory()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface getRepository()
 */
class PriceProductCustomerGroupDeleteConsole extends Console
{
    /**
     * @var string
     */
    public const COMMAND_NAME = 'price-product-customer-group:delete';

    /**
     * @var string
     */
    public const COMMAND_DESCRIPTION = 'Will delete all connections between product prices and customer groups.';

    /**
     * @var string
     */
    public const ARGUMENT_CUSTOMER_GROUP_ID = 'customer-group-id';

    /**
     * @return void
     */
    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName(static::COMMAND_NAME)
            ->setDescription(static::COMMAND_DESCRIPTION)
            ->addOption(static::ARGUMENT_CUSTOMER_GROUP_ID, 'm', InputArgument::OPTIONAL);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $idCustomerGroup = $input->getOption(static::ARGUMENT_CUSTOMER_GROUP_ID);
        if ($idCustomerGroup !== null) {
            $this->getFacade()
                ->deletePriceProductCustomerGroupByIdCustomerGroup((int)$idCustomerGroup);

            return static::CODE_SUCCESS;
        }

        $this->getFacade()->deleteAllPriceProductCustomerGroup();

        return static::CODE_SUCCESS;
    }
}
