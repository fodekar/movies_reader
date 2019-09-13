<ul>
    {foreach from=$movies key=index item=movie}
        <li>{$index}: {$movie}</li>
    {/foreach}
</ul>
<video width="320" height="240" controls>
  <source src="Faune.wmv" type="video/wmv">
Your browser does not support the video tag.
</video>
<!--
<ul>
{for $counter=0 to 3}
    <li>{$movies.$counter}</li>
{/for}
</ul>
-->