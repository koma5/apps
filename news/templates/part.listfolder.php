<li ng-class="{
	active: isFeedActive(feedType.Folder, folder.id), 
	open: folder.open,
	collapsible: folder.hasChildren,
	unread: getUnreadCount(feedType.Folder, folder.id)!=0}" 
	ng-repeat="folder in folders"
	ng-show="folder.show"
	class="folder"
	data-id="{{folder.id}}"
	droppable>
	<button class="collapse" 
			title="<?php p($l->t('Collapse'));?>"
			ng-click="toggleFolder(folder.id)"></button>
	<a href="#" 
	   class="title"
	   class="folder-icon"
	   ng-click="loadFeed(feedType.Folder, folder.id)">
	   {{folder.name}}
	</a>

	<span class="utils">
		<button class="svg action edit-icon" 
				ng-click="renameFolder(folder.id)"
				title="<?php p($l->t('Rename folder')); ?>"></button>

		<button ng-click="delete(feedType.Folder, folder.id)"
				class="svg action delete-icon" 
				title="<?php p($l->t('Delete folder')); ?>"></button>

		<button class="svg action mark-read-icon" 
				ng-click="markAllRead(feedType.Folder, folder.id)"
				title="<?php p($l->t('Mark all read')); ?>"></button>

		<span class="unread-counter">
			{{ getUnreadCount(feedType.Folder, folder.id) }}
		</span>

	</span>
	<ul>
		<?php print_unescaped($this->inc('part.listfeed', array('folderId' => 'folder.id'))); ?>
	</ul>
</li>