<?php if ($_SESSION["isAdmin"] == True) { ?>
  <div class="ui longer modal">
    <div class="header">Προσθήκη Challenge</div>
    <div class="scrolling content">
      <div class="ui middle aligned grid">
        <div class="column">
          <form id="new-challenge-form" class="ui large form">
            <div class="ui basic segment">
              
              <div class="required field">
                <label>Τίτλος</label>
                <input id="title" type="text" name="title" maxlength="120" placeholder="Τίτλος challenge">
              </div>

              <div class="required field">
                <label>Περιγραφή</label>
                <textarea id="description" name="description" maxlength="450"></textarea>
              </div>

              <div class="two fields">

                <div class="required field">
                  <label>Δυσκολία</label>
                  <select id="difficulty">
                    <option value="1">very easy</option>
                    <option value="2">easy</option>
                    <option value="3">medium</option>
                    <option value="4">a bit hard</option>
                    <option value="5">hard</option>
                    <option value="6">impossible</option>
                  </select>
                </div>

                <div class="disabled field">
                  <label>Challenge Type (not implemented)</label>
                  <select id="type">
                    <option value="1">Crypto</option>
                    <option value="2">Pwn</option>
                    <option value="3">Reversing</option>
                    <option value="4">Hardaware</option>
                    <option value="5">...</option>
                  </select>
                </div>

              </div>

              <div class="required field">
                <label>Λύση</label>
                <input id="flag" type="text" name="flag" maxlength="120" placeholder="FLAG{...}">
              </div>

              <div id="errors" class="ui error message">
                <div class="header">Προσοχή!</div>
                <ul id="error-list" class="list">
                </ul>
              </div>

              <div id="info" class="ui message">
                <div class="header">Status:</div>
                <ul class="list">
                  <li>Λειτουργουν Τίτλος, Περιγραφή, Δυσκολία</li>
                  <li>Δεν υπαρχει FLAG solve ( στη database )</li>
                  <li>Θελουμε Hide solved</li>
                </ul>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="actions">
      <!-- <div class="ui cancel button">Cancel</div>
      <div class="primary ui approve right labeled icon button"> -->
      <div class="negative ui cancel button">Cancel</div>
      <div class="positive ui approve right labeled icon button">
        <i class="checkmark icon"></i>
        Προσθήκη
      </div>
    </div>
  </div>
<?php } ?>
