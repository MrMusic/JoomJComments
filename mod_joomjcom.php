<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-2.0/Module/JoomJComments/trunk/mod_joomjcom.php $
// $Id: mod_joomjcom.php 3657 2012-02-21 14:24:59Z chraneco $
/******************************************************************************\
**   JoomGallery Module 'JoomJCom' 2.0 BETA (integrates JComments into JG)    **
**   By: JoomGallery::ProjectTeam                                             **
**   Copyright (C) 2009 - 2012  Patrick Alt                                   **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look             **
**   at administrator/components/com_joomgallery/LICENSE.TXT                  **
\******************************************************************************/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// Check to ensure that we are in JoomGallery ambit
if(!class_exists('JoomAmbit'))
{
  echo 'We are not in JoomGallery Ambit';

  return;
}

$app = JFactory::getApplication();
switch($app->input->get('view'))
{
  case 'detail':
    $id     = $app->input->get('id', 0, 'int');
    $group  = 'com_joomgallery';
    $title  = '';
    break;
  case 'category':
    $id     = $app->input->get('catid', 0, 'int');
    $group  = 'com_joomgallery_categories';
    $title  = '';
    break;
  case 'gallery':
    // 'break' intentionally omitted
  case '':
    $id     = 1;
    $group  = 'com_joomgallery_gallery';
    $title  = JText::_('COM_JOOMGALLERY_COMMON_GALLERY');
    break;
  default:
    // Nothing to do
    return;
    break;
}

$comments = JPATH_ROOT.'/components/com_jcomments/jcomments.php';
if(file_exists($comments))
{
  require_once($comments);
  echo JComments::showComments($id, $group, $title);
}
else
{
  echo 'JComments is not installed';
}