deasilworks\cms\Util\Command\InstallCommand
===============

Class InstallCommand.

Responsible for installing CMS.
 - Creating tables
 - Creating configuration


* Class name: InstallCommand
* Namespace: deasilworks\cms\Util\Command
* Parent class: [deasilworks\cms\Util\Command\CMSCommand](deasilworks-cms-Util-Command-CMSCommand.md)





Properties
----------


### $stmtManager

    private \deasilworks\cef\StatementManager $stmtManager





* Visibility: **private**


### $cio

    protected \Symfony\Component\Console\Style\SymfonyStyle $cio

Command inout output.



* Visibility: **protected**


### $twig

    protected \Twig_Environment $twig





* Visibility: **protected**


### $cef

    protected \deasilworks\cef\CEF $cef





* Visibility: **protected**


Methods
-------


### configure

    void deasilworks\cms\Util\Command\InstallCommand::configure()





* Visibility: **protected**




### execute

    integer|null|void deasilworks\cms\Util\Command\InstallCommand::execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)





* Visibility: **protected**


#### Arguments
* $input **Symfony\Component\Console\Input\InputInterface**
* $output **Symfony\Component\Console\Output\OutputInterface**



### getCqlFromTemplate

    string deasilworks\cms\Util\Command\InstallCommand::getCqlFromTemplate($template, $args)





* Visibility: **protected**


#### Arguments
* $template **mixed**
* $args **mixed**



### exeCql

    mixed deasilworks\cms\Util\Command\InstallCommand::exeCql($cql)





* Visibility: **protected**


#### Arguments
* $cql **mixed**



### __construct

    mixed deasilworks\cms\Util\Command\CMSCommand::__construct(null $name)

InstallCommand constructor.



* Visibility: **public**
* This method is defined by [deasilworks\cms\Util\Command\CMSCommand](deasilworks-cms-Util-Command-CMSCommand.md)


#### Arguments
* $name **null**



## LICENSE

MIT

##### This open-source project is brought to you by [Deasil Works, Inc.](http://deasil.works/) Copyright &copy; 2017 Deasil Works, Inc.