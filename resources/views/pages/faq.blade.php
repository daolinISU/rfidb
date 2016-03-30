@extends('app')

@section('content')
    <script type="text/javascript">
        var collapseDivs, collapseLinks;

        function createDocumentStructure(tagName) {
            if (document.getElementsByTagName) {
                var elements = document.getElementsByTagName(tagName);
                collapseDivs = new Array(elements.length);
                collapseLinks = new Array(elements.length);
                for (var i = 0; i < elements.length; i++) {
                    var element = elements[i];
                    var siblingContainer;
                    if (document.createElement &&
                            (siblingContainer = document.createElement('div')) &&
                            siblingContainer.style) {
                        var nextSibling = element.nextSibling;
                        element.parentNode.insertBefore(siblingContainer, nextSibling);
                        var nextElement = elements[i + 1];
                        while (nextSibling != nextElement && nextSibling != null) {
                            var toMove = nextSibling;
                            nextSibling = nextSibling.nextSibling;
                            siblingContainer.appendChild(toMove);
                        }
                        siblingContainer.style.display = 'none';

                        collapseDivs[i] = siblingContainer;

                        createCollapseLink(element, siblingContainer, i);
                    }
                    else {
                        // no dynamic creation of elements possible
                        return;
                    }
                }
                createCollapseExpandAll(elements[0]);
            }
        }

        function createCollapseLink(element, siblingContainer, index) {
            var span;
            if (document.createElement && (span = document.createElement('span'))) {
                span.appendChild(document.createTextNode(String.fromCharCode(160)));
                var link = document.createElement('a');
                link.collapseDiv = siblingContainer;
                link.href = '#';
                link.appendChild(document.createTextNode('expand'));
                link.onclick = collapseExpandLink;
                collapseLinks[index] = link;
                span.appendChild(link);
                element.appendChild(span);
            }
        }

        function collapseExpandLink(evt) {
            if (this.collapseDiv.style.display == '') {
                this.parentNode.parentNode.nextSibling.style.display = 'none';
                this.firstChild.nodeValue = 'expand';
            }
            else {
                this.parentNode.parentNode.nextSibling.style.display = '';
                this.firstChild.nodeValue = 'collapse';
            }

            if (evt && evt.preventDefault) {
                evt.preventDefault();
            }
            return false;
        }

        function createCollapseExpandAll(firstElement) {
            var div;
            if (document.createElement && (div = document.createElement('div'))) {
                var link = document.createElement('a');
                link.href = '#';
                link.appendChild(document.createTextNode('expand all'));
                link.onclick = expandAll;
                div.appendChild(link);
                div.appendChild(document.createTextNode(' '));
                link = document.createElement('a');
                link.href = '#';
                link.appendChild(document.createTextNode('collapse all'));
                link.onclick = collapseAll;
                div.appendChild(link);
                firstElement.parentNode.insertBefore(div, firstElement);
            }
        }

        function expandAll(evt) {
            for (var i = 0; i < collapseDivs.length; i++) {
                collapseDivs[i].style.display = '';
                collapseLinks[i].firstChild.nodeValue = 'collapse';
            }

            if (evt && evt.preventDefault) {
                evt.preventDefault();
            }
            return false;
        }

        function collapseAll(evt) {
            for (var i = 0; i < collapseDivs.length; i++) {
                collapseDivs[i].style.display = 'none';
                collapseLinks[i].firstChild.nodeValue = 'expand';
            }

            if (evt && evt.preventDefault) {
                evt.preventDefault();
            }
            return false;
        }
    </script>
    <script type="text/javascript">
        window.onload = function (evt) {
            createDocumentStructure('h2');
        }
    </script>


    <div class="well">
        <h1>Frequently Asked Questions</h1>
        <p>Please click expand/collapse to view/hide the answer to the question.</p>

        <h2>What is in the database?</h2>
        <p>Some facts about RFI database are listed <a href="/overview">here</a>. To see what is in this database, click
            <a href="/tables"
               onclick="window.open('/tables', 'Popup', 'resizable=1,scrollbars=yes,width=1000,height=800'); return false;">
                here
            </a></p>
        <h2>What if basic search does not have results I need?</h2>
        <p>You can run your own SQL script in <a href="/advancedSearch">Advanced Search</a>.</p>

        <h2>MySQL by examples</h2>
        <p>Below are some beginner examples,
            MySQL syntax is displayed in <span style="color: blue">blue</span>,
            comments displayed in <span style="color: red">blue</span>.
        <ol>
            <li>
                List all the rows of the specific columns
            </li><pre style="color:blue">SELECT column1Name, column2Name <font color="red">/* multiple columns can be separated by comma */</font>
FROM table_name;</pre>
            <li>
                List all the rows of ALL columns
            </li><pre style="color:blue">SELECT * <font color="red">-- "*" is a wildcard denoting all columns </font>
FROM table_name;</pre>
            <li>
                List rows that meet the specified criteria in WHERE clause
            </li><pre style="color:blue">SELECT *
FROM table_name
WHERE column1Name > 200;<font color="red">-- "column1Name > 200" can be replaced by other criteria</font></pre>
            <li>
                List maximum value of a column
            </li><pre style="color:blue">SELECT MAX(column1Name)
FROM table_name;<font color="red">-- "MAX(column1Name)" will display max value in that column</font></pre>
            <li>
                Basic aggregation
            </li><pre style="color:blue">SELECT column1Name, MAX(column2Name) as foo<font color="red">-- max value will has a column name "foo"</font>
FROM table_name
GROUP BY column1Name;<font color="red">-- use GROUP BY to group values from a column,
                    and, if you wish, perform calculations on that column.
                    You can use COUNT, SUM, AVG, etc., functions on the grouped column. </font></pre>

        </ol>
    </div>
@endsection

