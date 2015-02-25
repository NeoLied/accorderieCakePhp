<!-- File: /app/View/Utilisateurs/index.ctp -->

<h1>Utilisateurs</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Username</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['nom'],
            array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['prenom']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td>
        	<?php
        	if($user['User']['id'] == AuthComponent::user('id') || AuthComponent::user('role') == "admin"){
	        	echo $this->Form->postLink(
	                'Supprimer',
	                array('action' => 'delete', $user['User']['id']),
	                array('confirm' => 'Etes-vous sûr ?'));
	        	echo " ";
            	echo $this->Html->link(
                	'Editer',
                	array('action' => 'edit', $user['User']['id'])
            	);
            } ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>