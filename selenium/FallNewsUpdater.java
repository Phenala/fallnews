import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.Keys;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.concurrent.TimeUnit;

/**
 * Created by hp on 5/26/2018.
 */
public class FallNewsUpdater {

    WebDriver wd;
    WebDriver fallwd;
    String password = "1234qazwsxedc";
    String uploadurl = "http://fallnews.gearhostpreview.com/adminUpload.php";
    int timeout = 300;
    int limit = 10;

    public FallNewsUpdater() {



        //The following lines are to remove chromes image loading feature for faster load time

        HashMap<String, Object> images = new HashMap<String, Object>();
        images.put("images", 2);

        HashMap<String, Object> prefs = new HashMap<String, Object>();
        prefs.put("profile.default_content_setting_values", images);

        ChromeOptions chrome_options =new ChromeOptions();
        chrome_options.setExperimentalOption("prefs", prefs);

        DesiredCapabilities chromeCaps = DesiredCapabilities.chrome();
        chromeCaps.setCapability(ChromeOptions.CAPABILITY, chrome_options);

        wd = new ChromeDriver(chromeCaps);
        fallwd = new ChromeDriver();


        //call functions to update articles from different websites
        updateFromPolygon();
        updateFromLiveScience();
        updateFromScreenRant();

    }

    public void updateFromPolygon() {
        String url = "https://www.polygon.com/news";
        wd.get(url);
        List<WebElement> we = wd.findElements(By.cssSelector(".c-compact-river .c-entry-box--compact__body h2 a"));
        ArrayList<String> links = new ArrayList<>();
        for (WebElement element: we) {
            links.add(element.getAttribute("href"));
        }
        for (int i = 0; i < limit; i++) {
            try {
                wd.manage().timeouts().pageLoadTimeout(timeout, TimeUnit.SECONDS);
                wd.get(links.get(i));
                String link = links.get(i);
                String title = wd.findElement(By.cssSelector(".c-entry-hero__header-wrap h1")).getText();
                System.out.println(title);
                String content = "";
                for (WebElement p : wd.findElements(By.cssSelector(".l-col__main .c-entry-content p"))) {
                    content += p.getText() + "<br/><br/>";
                }
                System.out.println(content);
                String image = wd.findElement(By.cssSelector(".l-col__main figure picture img")).getAttribute("src");
                System.out.println(image);
                String source = "Polygon.com";
                String sourceicon = "images/polygon.com.png";
                String category = "gaming";

                enterNews(title, content, link, image, source, sourceicon, category);
            } catch (Exception ex) {
                System.out.println("Cant assess article. Skipping...");
            }
        }
//        WebElement we = wd.findElement(By.cssSelector(".c-compact-river .c-entry-box--compact__body a"));
//        wd.get(we.getAttribute("href"));
    }

    public void updateFromLiveScience() {
        String url = "https://www.thestar.com.my/tech/tech-news";
        wd.get(url);
        List<WebElement> we = wd.findElements(By.cssSelector(".sub-section-list div div h2 a"));
        ArrayList<String> links = new ArrayList<>();
        for (WebElement element: we) {
            links.add(element.getAttribute("href"));
        }
        for (int i = 0; i < limit; i++) {
            try {
                wd.manage().timeouts().pageLoadTimeout(timeout, TimeUnit.SECONDS);
                wd.get(links.get(i));
                String link = links.get(i);
                String title = wd.findElement(By.cssSelector(".headline h1")).getText();
                System.out.println(title);
                String content = wd.findElement(By.id("slcontent_0_sleft_0_storyDiv")).getText();
                content = content.replaceAll("\n", "<br/>");
                System.out.println(content);
                String image = wd.findElement(By.cssSelector("article .story-image img")).getAttribute("src");
                System.out.println(image);
                String source = "TheStar.com";
                String sourceicon = "images/thestar.com.png";
                String category = "technology";

                enterNews(title, content, link, image, source, sourceicon, category);
            } catch (Exception ex) {
                System.out.println("Cant assess article. Skipping...");
            }
        }

    }

    public void updateFromScreenRant() {
        String url = "https://screenrant.com/movie-news";
        wd.navigate().to(url);
        List<WebElement> we = wd.findElements(By.cssSelector(".bc-info .bc-title a"));
        ArrayList<String> links = new ArrayList<>();
        for (WebElement element: we) {
            links.add(element.getAttribute("href"));
        }
        for (int i = 0; i < limit; i++) {
            try {
                wd.manage().timeouts().pageLoadTimeout(timeout, TimeUnit.SECONDS);
                wd.get(links.get(i));
                String link = links.get(i);
                String title = wd.findElement(By.cssSelector("article .article-header h1")).getText();
                System.out.println(title);
                String content = "";
                for (WebElement p : wd.findElements(By.cssSelector("section .art-body-content p"))) {
                    content += p.getText() + "<br/><br/>";
                }
                System.out.println(content);
                String image = wd.findElement(By.cssSelector("article figure picture source")).getAttribute("srcset");
                System.out.println(image);
                String source = "ScreenRant.com";
                String sourceicon = "images/screenrant.com.png";
                String category = "entertainment";

                enterNews(title, content, link, image, source, sourceicon, category);
            } catch (Exception ex) {
                System.out.println("Cant assess article. Skipping...");
            }
        }
//        WebElement we = wd.findElement(By.cssSelector(".c-compact-river .c-entry-box--compact__body a"));
//        wd.get(we.getAttribute("href"));
    }

    public void enterNews(String title, String content, String link, String image, String source, String sourceicon, String category) {


        fallwd.get(uploadurl);
        fallwd.findElement(By.id("authorization")).sendKeys(password);
        fallwd.findElement(By.id("title")).sendKeys(title);
        fallwd.findElement(By.id("content")).sendKeys(content);
        fallwd.findElement(By.id("link")).sendKeys(link);
        fallwd.findElement(By.id("imagelink")).sendKeys(image);
        fallwd.findElement(By.id("source")).sendKeys(source);
        fallwd.findElement(By.id("sourceicon")).sendKeys(sourceicon);
        fallwd.findElement(By.id("category")).sendKeys(category);
        fallwd.findElement(By.id("submit")).click();

    }

}
