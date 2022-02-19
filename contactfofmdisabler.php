class ContactFormDisabler extends Module 
{
    public function __construct() 
    {
        $this->name = 'contactformdisabler';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->author = 'Aleš Jandera';

        parent::__construct();

        $this->displayName = $this->l('Contact form disabler');
        $this->description = $this->l('Disables contact form submission.');
    }

    public function install() 
    {
        return parent::install() && $this->registerHook('actionDispatcher');
    }

    public function hookActionDispatcher($params) 
    {
        if ($params['controller_type'] === 1 
            && $params['controller_class'] === 'ContactController'
            && Tools::isSubmit('submitMessage')) {
               die('Contact form submission disabled');
        }
    }
}