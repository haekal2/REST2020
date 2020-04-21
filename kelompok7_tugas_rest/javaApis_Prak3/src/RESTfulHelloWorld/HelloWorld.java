package RESTfulHelloWorld;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

@Path("welcome")
public class HelloWorld {
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String getWelcome(){
        return "Congratulation you create the first RESTFul webservice";
    }

    @GET
    @Path("{yourName}")
    @Produces(MediaType.TEXT_PLAIN)
    public String greatringWelcome(@PathParam("yourName") String name){
        String output = "Hi " + name + ". Selamat Datang.";
        return output;
    }
}
