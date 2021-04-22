<!------- active chats ------->
<p class="active-chats-heading"> Active Chats</p>

<div data-step="6" data-position="left" data-intro="This is a list of trending chats by people or companies you follow.">
    <?php $chats->displayActiveChats(); ?>
    <!------- topic active chat ------->
</div>

<!------- popular chats ------->
<p class="active-chats-heading"> Popular Chats</p>
<div data-step="7" data-position="left" data-intro="This is a list of trending chats by everyone or every company based on your location.">
    <?php $chats->displayPopularChats(); ?>
</div>

<!------- block user ------->
<div class="block-user-bar">
    <a data-toggle="modal" href="#block-user-modal" role="button"><i class="flaticon-remove11"></i> block</a>
    <a href="#"><i class="flaticon-search19"></i> search</a>
    <a href="#"><i class="flaticon-bull1"></i> report</a>
</div>

<!------- block user modal ------->
<div class="modal hide fade" id="block-user-modal" role="dialog">
    <div class="modal-dialog"></div>
    there is nothing
</div>

