<div class="block block-poll">
   <div class="block-title">Khảo sát </div>
   <form id="pollForm" action="#" method="post" onSubmit="return validatePollAnswerIsSelected();">
      <div class="block-content">
         <p class="block-subtitle">Bạn có thường mua nông sản sạch ở đâu?</p>
         <ul id="poll-answers">
            <li class="odd">
               <input type="radio" name="vote" class="radio poll_vote" id="vote_1" value="1">
               <span class="label">
               <label for="vote_1">Siêu thị</label>
               </span>
            </li>
            <li class="even">
               <input type="radio" name="vote" class="radio poll_vote" id="vote_2" value="2">
               <span class="label">
               <label for="vote_2">Cơ sở sản xuất</label>
               </span>
            </li>
            <li class="odd">
               <input type="radio" name="vote" class="radio poll_vote" id="vote_3" value="3">
               <span class="label">
               <label for="vote_3">Người trồng cá nhân</label>
               </span>
            </li>
            <li class="last even">
               <input type="radio" name="vote" class="radio poll_vote" id="vote_4" value="4">
               <span class="label">
               <label for="vote_4">Tự trồng</label>
               </span>
            </li>
         </ul>
         <div class="actions">
            <button type="submit" title="Vote" class="button button-vote"><span>Đồng ý</span></button>
         </div>
      </div>
   </form>
</div>