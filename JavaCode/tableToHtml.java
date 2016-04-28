package tools;

import java.io.BufferedWriter;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.StringTokenizer;

public class tableToHtml {
	private static final String tableHead = "<table class=\"table table-striped\">\r\n"
			+ "    <thead>\r\n";

	public static void toHtml(String in, String out) {
		BufferedReader br = null;

		try {
			br = new BufferedReader(new FileReader(in));
			String line = null;

			// Assume default encoding.
			FileWriter fileWriter = new FileWriter(out);

			// Always wrap FileWriter in BufferedWriter.
			BufferedWriter bw = new BufferedWriter(fileWriter);

			// bw.write("added ");
			boolean tableAhead = false;
			while ((line = br.readLine()) != null) {
				// take line parse it to table rows and add other tags
				// System.out.println("This line length = " + line.length());
				line = line.trim();
				// empty means end of table and new table next
				if (line.length() == 0) {
					if(tableAhead) bw.write("</tbody>\r\n        </table>\r\n");
					if(!tableAhead) tableAhead = true;
					
					line = br.readLine().trim();
					// System.out.println("This line length = " +
					// line.length());
					// line is now table id and description
					StringTokenizer st = new StringTokenizer(line, "\t");
					System.out.println("This line has " + st.countTokens()
							+ " columns");
					bw.write("<h2>");
					bw.write("Table: ");
					bw.write(st.nextToken());
					bw.write("</h2>\r\n");
					bw.write("<p>");
					if(st.hasMoreTokens()) bw.write(st.nextToken());
					bw.write("</p>\r\n");
					bw.write(tableHead);
					bw.write("<tr>\r\n"
							+ "	                <th class=\"col-sm-4\">");
					bw.write("Attribute name");
					bw.write("</th>\r\n"
							+ "                <th class=\"col-sm-8\">");
					bw.write("Description");
					bw.write("</th>\r\n" + "		            </tr>\r\n"
							+ "		            </thead>\r\n"
							+ "		            <tbody>\r\n");

				} else {
					// distinguish header and rows
					// always two columns
					// TODO
					StringTokenizer st = new StringTokenizer(line, "\t");
					int columns = st.countTokens();
					System.out.println("This line has " + columns + " columns");
					bw.write("<tr>\r\n");
					while (st.hasMoreTokens()) {
						bw.write("<td>");
						bw.write(st.nextToken());
						bw.write("</td>\r\n");
					}
					bw.write("</tr>\r\n");
				}
				// bufferedWriter.write(line +"\r\n"+ "newline ahead \r\n");

				// line = br.readLine();
			}
			
			bw.write("</tbody>\r\n        </table>\r\n");

			br.close();
			bw.close();

		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}

	}

	public static void main(String[] args) throws IOException {
		String output = "out.txt";
		String input = "input.txt";
		toHtml(input, output);

	}

}
