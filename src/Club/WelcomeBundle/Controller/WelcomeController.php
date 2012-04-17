<?php

namespace Club\WelcomeBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
  /**
   * @Route("/welcome")
   * @Template()
   */
  public function indexAction()
  {
    $em = $this->getDoctrine()->getEntityManager();

    $task = $em->find('ClubTaskBundle:Task', 1);
    $event = new \Club\TaskBundle\Event\FilterTaskEvent($task);
    $this->get('event_dispatcher')->dispatch(\Club\TaskBundle\Event\Events::onMatchTask, $event);

    $welcome = $em->getRepository('ClubWelcomeBundle:Welcome')->findOneBy(array(
      'location' => 1
    ));
    $posts = $em->getRepository('ClubWelcomeBundle:Blog')->findBy(array(), array('id' => 'desc'), 10);

    return array(
      'welcome' => $welcome,
      'posts' => $posts
    );
  }
}
