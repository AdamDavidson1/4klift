deasilworks\CMS\Util\Command\InstallCommand
===============

Class InstallCommand.

Responsible for installing CMS.
 - Creating tables
 - Creating configuration


* Class name: InstallCommand
* Namespace: deasilworks\CMS\Util\Command
* Parent class: [deasilworks\CMS\Util\Command\CMSCommand](deasilworks-CMS-Util-Command-CMSCommand.md)





Properties
----------


### $stmtManager

    private \deasilworks\CEF\StatementManager $stmtManager





* Visibility: **private**


### $cio

    protected \Symfony\Component\Console\Style\SymfonyStyle $cio

Command inout output.



* Visibility: **protected**


### $twig

    protected \Twig_Environment $twig





* Visibility: **protected**


### $cef

    protected \deasilworks\CEF\CEF $cef





* Visibility: **protected**


Methods
-------


### configure

    void deasilworks\CMS\Util\Command\InstallCommand::configure()





* Visibility: **protected**




### execute

    integer|null|void deasilworks\CMS\Util\Command\InstallCommand::execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)





* Visibility: **protected**


#### Arguments
* $input **Symfony\Component\Console\Input\InputInterface**
* $output **Symfony\Component\Console\Output\OutputInterface**



### getCqlFromTemplate

    string deasilworks\CMS\Util\Command\InstallCommand::getCqlFromTemplate($template, $args)





* Visibility: **protected**


#### Arguments
* $template **mixed**
* $args **mixed**



### exeCql

    mixed deasilworks\CMS\Util\Command\InstallCommand::exeCql($cql)





* Visibility: **protected**


#### Arguments
* $cql **mixed**



### __construct

    mixed deasilworks\CMS\Util\Command\CMSCommand::__construct(null $name)

InstallCommand constructor.



* Visibility: **public**
* This method is defined by [deasilworks\CMS\Util\Command\CMSCommand](deasilworks-CMS-Util-Command-CMSCommand.md)


#### Arguments
* $name **null**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.